<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolYear;
use App\Services\SchoolService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminSchoolController extends Controller
{
    public function __construct(
        protected SchoolService $schoolService
    ) {}

    public function store(Request $request): RedirectResponse
    {
        $currentYear = SchoolYear::getSessionCurrent();
        if (! $currentYear) {
            return redirect()->route('admin.schools')
                ->with('error', 'Δεν υπάρχει διαθέσιμο σχολικό έτος');
        }

        $validated = $request->validate([
            'kodikos_sxoleiou' => [
                'required',
                'string',
                'max:10',
                Rule::unique('schools', 'kodikos_sxoleiou')
                    ->where('school_year_id', $currentYear->id),
            ],
            'typos_sxoleiou' => ['required', Rule::in($this->schoolService->getSchoolTypes())],
            'displayname' => ['required', 'string', 'max:255'],
            'phonenumbers' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        $currentYear->schools()->create($validated);

        return redirect()->route('admin.schools')
            ->with('success', 'Η σχολική μονάδα προστέθηκε επιτυχώς.');
    }

    public function copy(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'source_school_year_id' => ['required', 'integer', 'exists:schoolyears,id', 'different:target_school_year_id'],
            'target_school_year_id' => ['required', 'integer', 'exists:schoolyears,id'],
        ]);

        $sourceYear = SchoolYear::findOrFail($validated['source_school_year_id']);
        $targetYear = SchoolYear::findOrFail($validated['target_school_year_id']);

        $createdCount = DB::transaction(function () use ($sourceYear, $targetYear): int {
            $createdCount = 0;

            foreach ($sourceYear->schools as $school) {
                $copiedSchool = School::firstOrCreate(
                    [
                        'school_year_id' => $targetYear->id,
                        'kodikos_sxoleiou' => $school->kodikos_sxoleiou,
                    ],
                    [
                        'typos_sxoleiou' => $school->typos_sxoleiou,
                        'displayname' => $school->displayname,
                        'phonenumbers' => $school->phonenumbers,
                        'email' => $school->email,
                    ],
                );

                if ($copiedSchool->wasRecentlyCreated) {
                    $createdCount++;
                }
            }

            return $createdCount;
        });

        return redirect()->route('admin.schools')
            ->with('success', "Προστέθηκαν {$createdCount} σχολικές μονάδες. Οι υπάρχουσες εγγραφές διατηρήθηκαν.");
    }

    public function destroy(School $school): RedirectResponse
    {
        $currentYear = SchoolYear::getSessionCurrent();
        abort_unless($currentYear && $school->school_year_id === $currentYear->id, 404);

        $deleted = DB::transaction(function () use ($school, $currentYear): bool {
            $lockedSchool = School::query()
                ->whereKey($school->getKey())
                ->lockForUpdate()
                ->firstOrFail();

            if ($lockedSchool->excursions()
                ->where('school_year_id', $currentYear->id)
                ->exists()) {
                return false;
            }

            $lockedSchool->delete();

            return true;
        });

        if (! $deleted) {
            return redirect()->route('admin.schools')
                ->with('error', 'Η σχολική μονάδα δεν μπορεί να διαγραφεί, επειδή έχει καταχωρηθεί εκδρομή για το τρέχον σχολικό έτος.');
        }

        return redirect()->route('admin.schools')
            ->with('success', 'Η σχολική μονάδα διαγράφηκε επιτυχώς.');
    }
}
