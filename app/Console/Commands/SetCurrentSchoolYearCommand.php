<?php

namespace App\Console\Commands;

use App\Models\SchoolYear;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

use function Laravel\Prompts\select;

#[Signature('school-year:set-current {name}')]
#[Description('Command description')]
class SetCurrentSchoolYearCommand extends Command implements PromptsForMissingInput
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $schoolYear = SchoolYear::where('sxoliko_etos', $name)->first();

        if (! $schoolYear) {
            $this->fail("Το σχολικό έτος '$name' δεν βρέθηκε.");
        }

        if ($schoolYear->is_current) {
            return;
        }

        SchoolYear::where('is_current', 1)
            ->update([
                'is_current' => false,
            ]);

        $schoolYear->is_current = true;
        $schoolYear->save();
    }

    /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array<string, string>
     */
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => fn () => select(
                label: 'Επιλέξτε σχολική χρονιά',
                options: SchoolYear::orderBy('id', 'desc')
                    ->pluck('sxoliko_etos'),
                default: SchoolYear::where('is_current', 1)->first()?->sxoliko_etos ?? null
            ),
        ];
    }
}
