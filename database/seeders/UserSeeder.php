<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(50)
            ->hasAddresses(3)
            ->hasPayments(3)
            ->create();
    }
}
