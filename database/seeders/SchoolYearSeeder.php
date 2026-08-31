<?php

namespace Database\Seeders;

use App\Models\SchoolYear;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 2024; $i < 2035; $i++) {
            SchoolYear::firstOrCreate([
                'sxoliko_etos' => $i.'_'.$i + 1,
            ]);
        }
    }
}
