<?php

namespace Database\Factories;

use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<School>
 */
class SchoolFactory extends Factory
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
            'kodikos_sxoleiou' => '1901000',
            'typos_sxoleiou' => 'ΓΥΜΝΑΣΙΟ',
            'displayname' => 'Γυμνάσιο Δοκιμής',
            'phonenumbers' => '2310000000',
            'email' => 'school@example.com',
        ];
    }
}
