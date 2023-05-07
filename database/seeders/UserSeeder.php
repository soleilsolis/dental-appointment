<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'test1@dispostable.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$pWCHGnVMmdDskcPmBvyzneHJgaW7cCM5lWG5jkiwmWRzlGxzXuSHK',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'type' => 'admin',
        ]);
    }
}
