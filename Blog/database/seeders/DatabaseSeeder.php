<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        Post::factory(50)->create();
        // Category::factory(4)->create();

        User::create([
            'name' => 'Ricky',
            'username' => 'Ricky99',
            'email' => 'ricky@gmail.com',
            'password' => bcrypt('password')
        ]);

        Category::create([
            'title' => 'Web programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'title' => 'Web design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'title' => 'Web personal',
            'slug' => 'web-personal'
        ]);

        Category::create([
            'title' => 'Web frontend',
            'slug' => 'web-frontend'
        ]);
        
        Category::create([
            'title' => 'Web backend',
            'slug' => 'web-backend'
        ]);
        // Post::create([
        //     'judul' => 'judul pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, adipisci?',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit deserunt, in modi 
        //     sint recusandae doloremque ab molestiae dicta nemo repellendus.',
        //     'category_id' => 1,
        //     // 'user_id' => 1
        // ]);

        // Post::create([
        //     'judul' => 'judul kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, adipisci?',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit deserunt, in modi 
        //     sint recusandae doloremque ab molestiae dicta nemo repellendus.',
        //     'category_id' => 1,
        //     // 'user_id' => 1
        // ]);
        // Post::create([
        //     'judul' => 'judul ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, adipisci?',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit deserunt, in modi 
        //     sint recusandae doloremque ab molestiae dicta nemo repellendus.',
        //     'category_id' => 2,
        //     // 'user_id' => 1
        // ]);
    }
}
