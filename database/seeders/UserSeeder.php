<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('123'),
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'admin1',
        //     'email' => 'admin123@example.com',
        //     'password' => Hash::make('123'),
        // ]);

        User::factory()
            ->count(5)
            ->create();
    }
}
