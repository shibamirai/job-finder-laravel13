<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = env('MANAGER_NAME', null);
        $email = env('MANAGER_EMAIL', null);
        $password = env('MANAGER_PASSWORD', null);

        if ($name != null && $email != null && $password != null) {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
        }
    }
}
