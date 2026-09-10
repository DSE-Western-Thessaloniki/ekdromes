<?php

namespace Database\Factories;

use App\Models\Excursion;
use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Excursion>
 */
class ExcursionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_year_id' => SchoolYear::factory(),
            'school_id' => School::factory(),
            'eidos_ekdromis' => 'Σχολικός Περίπατος',
            'status' => 'ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ',
            'proorismos' => 'Θεσσαλονίκη',
            'hmera_ekdromis_anaxorisis' => $this->faker->date(),
            'hmera_epistrofis' => $this->faker->date(),
            'ora_anaxorisis' => '08:00:00',
            'ora_epistrofis' => '14:00:00',
            'ar_mathiton' => 20,
            'onoma_arxigos' => 'Γιάννης Παπαδόπουλος',
            'ar_prajis_syllogou' => '123/2026',
            'onoma_ypografonta' => 'Νικόλαος Αλεξίου',
            'prosfonisi_ypografonta' => 'Διευθυντής',
            'ar_prot_sxoleiou' => '100/2026',
            'hmera_diavivastikou' => $this->faker->date(),
            'metaforika_mesa' => 'Πεζή',
        ];
    }
}
