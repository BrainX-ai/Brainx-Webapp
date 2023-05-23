<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'BrainX - Admin',
            'email' => 'admin@brainx.biz',
            'email_verified_at' => now(),
            'role' => 'Admin',
            'password' => Hash::make("Abcde12345#*"), // password
            'remember_token' => Str::random(10),
        ]);

        // \App\Models\Admin::factory()->create([
        //     'name' => 'Test Admin',
        //     'email' => 'admin@example.com',
        // ]);
    }
}
