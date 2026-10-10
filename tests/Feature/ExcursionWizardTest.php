<?php

test('renders an accessible bounded wizard progress value', function (): void {
    $html = view('components.excursion.wizard.progress', ['percent' => 150])->render();

    $this->assertStringContainsString('aria-valuenow="100"', $html);
    $this->assertStringContainsString('aria-valuetext="100% ολοκληρώθηκε"', $html);
    $this->assertStringContainsString('style="width: 100%"', $html);
});

test('renders accessible answer and back navigation for wizard questions', function (): void {
    $html = view('components.excursion.wizard.ask', [
        'question' => 'Η εκδρομή αφορά εκπαιδευτικό πρόγραμμα;',
        'prevstep' => '>ΕΔ',
        'replyA' => 'Όχι',
        'stepA' => '>ΥΠΟΛΟΙΠΕΣ',
        'replyB' => 'Ναι',
        'stepB' => '>ERASMUS',
    ])->render();

    $this->assertStringContainsString('aria-labelledby="wizard-question"', $html);
    $this->assertStringContainsString('aria-label="Επιλέξτε απάντηση"', $html);
    $this->assertStringContainsString('>Όχι</span>', $html);
    $this->assertStringContainsString('>Ναι</span>', $html);
    $this->assertStringContainsString(route('excursion.wizard', ['step' => '>ΕΔ']), $html);
    $this->assertStringContainsString('border-gray-300 bg-white', $html);
    $this->assertStringContainsString('hover:border-brand hover:text-brand', $html);
    $this->assertStringContainsString('Προηγούμενο βήμα', $html);
});

test('renders wizard page previous-step links with the shared warning-button class', function (): void {
    $html = view('excursion.wizard.ed_brabreush_adel')->render();

    $this->assertStringContainsString('btn btn-warning', $html);
    $this->assertStringContainsString(route('excursion.wizard', ['step' => '>ΕΔ>ΟΧΙΒΡΑΒΕΥΣΗ']), $html);
    $this->assertStringContainsString('Προηγούμενο βήμα', $html);
});
