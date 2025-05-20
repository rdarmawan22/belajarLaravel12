<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        //DB::table('blogs')->truncate(); //untuk hapus data ditable

        // DB::table('blogs')->insert([
        //     'title' => 'blog 2',
        //     'description' => 'ini adalah desc blog 2',
        // ]);

        // DB::table('blogs')->insert([
        //     'title' => 'blog 3',
        //     'description' => 'ini adalah desc blog 3',
        // ]);

         Blog::factory()
            ->count(20)
            ->create();
    }
}
