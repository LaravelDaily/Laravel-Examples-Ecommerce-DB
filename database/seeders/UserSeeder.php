<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->vendor()
            ->create();

        User::factory(20)
            ->user()
            ->create();

        User::factory()
            ->superAdmin()
            ->create([
                'name'  => 'Test User',
                'email' => 'test@example.com',
            ]);
    }
}
