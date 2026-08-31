<?php

namespace App\Console\Commands;

use App\Models\SchoolYear;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

use function Laravel\Prompts\text;

#[Signature('school-year:add {name}')]
#[Description('Add new school year')]
class AddSchoolYearCommand extends Command implements PromptsForMissingInput
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        SchoolYear::create([
            'sxoliko_etos' => $name,
        ]);
    }

    /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array<string, string>
     */
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => fn () => text(
                label: 'Δώστε το όνομα της νέας σχολικής χρονιάς',
                placeholder: 'Πχ. 2025_2026',
                validate: fn (string $value) => match (true) {
                    mb_strlen($value) > 255 => 'Το όνομα δεν μπορεί να έχει μήκος μεγαλύτερο από 255',
                    preg_match('/[^a-zA-Z0-9_\p{Greek}]/u', $value) > 0 => 'Το όνομα μπορεί να περιέχει χαρακτήρες πεζούς και κεφαλαίους ελληνικούς, αγγλικούς, αριθμούς ή το χαρακτήρα _',
                    default => null
                }
            ),
        ];
    }
}
