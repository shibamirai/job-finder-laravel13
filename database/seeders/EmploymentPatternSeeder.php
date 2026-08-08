<?php

namespace Database\Seeders;

use App\Models\EmploymentPattern;
use Illuminate\Database\Seeder;

class EmploymentPatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmploymentPattern::create([
            'name' => '不明',
            'sort' => 7,
        ]);
        EmploymentPattern::create([
            'name' => '正社員',
            'sort' => 1,
        ]);
        EmploymentPattern::create([
            'name' => '契約社員',
            'sort' => 2,
        ]);
        EmploymentPattern::create([
            'name' => '派遣社員',
            'sort' => 3,
        ]);
        EmploymentPattern::create([
            'name' => 'アルバイト・パート',
            'sort' => 4,
        ]);
        EmploymentPattern::create([
            'name' => 'フリー',
            'sort' => 5,
        ]);
        EmploymentPattern::create([
            'name' => 'その他',
            'sort' => 6,
        ]);
    }
}
