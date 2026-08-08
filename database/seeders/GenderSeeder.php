<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::create([
            'name' => '非公表',
            'sort' => 3,
        ]);
        Gender::create([
            'name' => '男性',
            'sort' => 1,
        ]);
        Gender::create([
            'name' => '女性',
            'sort' => 2,
        ]);
    }
}
