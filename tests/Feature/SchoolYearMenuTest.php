<?php

use App\Http\Middleware\EnsureCasAccountHasAccess;
use App\Models\SchoolYear;
use DOMDocument;
use DOMElement;
use DOMXPath;
use Illuminate\Testing\TestResponse;
use Subfission\Cas\Middleware\CASAuth;

beforeEach(function (): void {
    SchoolYear::create([
        'sxoliko_etos' => '2026_2027',
        'is_current' => true,
    ]);
});

test('admin dashboard renders the school year menu with year options', function (): void {
    $response = adminDashboard();

    $response->assertOk();
    $response->assertSee('id="school-year-menu"', false);
    $response->assertSee('aria-controls="school-year-menu"', false);
    $response->assertSee('action="'.route('admin.session-switch-year').'"', false);
    $response->assertSee('2026_2027');
});

test('school year menu is not nested inside an element that clips overflow', function (): void {
    $response = adminDashboard();
    $response->assertOk();

    $menu = findSchoolYearMenu((string) $response->getContent());
    expect($menu)->not->toBeNull('The school-year menu must render for admins.');

    $clippingAncestors = [];
    for ($node = $menu->parentNode; $node instanceof DOMElement; $node = $node->parentNode) {
        $classes = array_intersect(['truncate', 'overflow-hidden'], explode(' ', $node->getAttribute('class')));
        if ($classes !== []) {
            $clippingAncestors[] = $node->tagName.'.'.implode('.', $classes);
        }
    }

    expect($clippingAncestors)->toBeEmpty(
        'The school-year menu must not be inside an element with overflow: hidden, otherwise it is clipped and invisible: '.implode(', ', $clippingAncestors)
    );
});

function adminDashboard(): TestResponse
{
    return test()->withoutMiddleware([CASAuth::class, EnsureCasAccountHasAccess::class])
        ->withSession(['cas_model_category' => 'user'])
        ->get(route('admin.index'));
}

function findSchoolYearMenu(string $html): ?DOMElement
{
    $document = new DOMDocument;
    libxml_use_internal_errors(true);
    $document->loadHTML('<?xml encoding="utf-8" ?>'.$html);
    libxml_clear_errors();

    $menu = (new DOMXPath($document))->query('//*[@id="school-year-menu"]')->item(0);

    return $menu instanceof DOMElement ? $menu : null;
}
