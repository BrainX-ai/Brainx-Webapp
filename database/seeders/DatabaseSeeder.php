<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        DB::table('users')->where('role', 'Admin')->update(['password' => Hash::make("BrainXAbcde12345#*")]);

        \App\Models\User::factory()->Create([
            'name' => 'BrainX - Contents',
            'email' => 'content@brainx.biz',
            'email_verified_at' => now(),
            'role' => 'editor',
            'password' => Hash::make("Abcde12345#*_contents"), // password
            'remember_token' => Str::random(10),
        ]);
        // Abcde12345#*_contents
        // \App\Models\Admin::factory()->create([
        //     'name' => 'Test Admin',
        //     'email' => 'admin@example.com',
        // ]);
    }
}
