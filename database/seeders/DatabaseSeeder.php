<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EmploymentPatternSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(HandicapSeeder::class);
        $this->call(OccupationSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(UserSeeder::class);
    }
}
