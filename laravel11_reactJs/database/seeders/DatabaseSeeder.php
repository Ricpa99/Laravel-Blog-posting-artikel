<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $admin = User::create([
            'name' => 'Ricky',
            'username' => 'ricky123',
            'email' => 'rikizulianto@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        Post::factory(20)->recycle([
            User::factory(5)->create(), 
            // Category::factory(3)->create(), 
            Category::create([
                'name' => 'web design',
                'slug' => 'Web-Design'
            ]),
            Category::create([
                'name' => 'ui ux',
                'slug' => 'Ui-Ux'
            ]),
            Category::create([
                'name' => 'dart',
                'slug' => 'dart'
            ]),
            Category::create([
                'name' => 'machine learning',
                'slug' => 'Machine-Learning'
            ]),
            $admin
            ])->create();
    }
}
