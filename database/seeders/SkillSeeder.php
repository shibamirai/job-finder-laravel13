<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create(['name' => 'Java']);
        Skill::create(['name' => 'PHP']);
        Skill::create(['name' => 'JavaScript']);
        Skill::create(['name' => 'Python']);
        Skill::create(['name' => 'HTML/CSS']);
        Skill::create(['name' => 'SQL']);
        Skill::create(['name' => 'Photoshop/Illustrator']);
        Skill::create(['name' => 'Office(Word/Excel)']);
        Skill::create(['name' => 'C/C++']);
        Skill::create(['name' => 'C#']);
        Skill::create(['name' => 'Flutter']);
        Skill::create(['name' => 'Google Apps Script']);
        Skill::create(['name' => 'Kotlin']);
        Skill::create(['name' => 'Ruby']);
        Skill::create(['name' => 'TypeScript']);
        Skill::create(['name' => 'Unity']);
    }
}
