<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Occupation::create(['is_it' => false, 'name' => '不明']);
        Occupation::create(['is_it' => true,  'name' => 'システムエンジニア・プログラマー']);
        Occupation::create(['is_it' => true,  'name' => 'デザイナー・Webデザイナー']);
        Occupation::create(['is_it' => true,  'name' => '社内システムエンジニア']);
        Occupation::create(['is_it' => false, 'name' => '一般事務']);
        Occupation::create(['is_it' => false, 'name' => '営業・販売']);
        Occupation::create(['is_it' => false, 'name' => '介護・福祉職員']);
        Occupation::create(['is_it' => false, 'name' => '教員・講師']);
        Occupation::create(['is_it' => false, 'name' => 'クリーニング']);
        Occupation::create(['is_it' => false, 'name' => 'コールセンター']);
    }
}
