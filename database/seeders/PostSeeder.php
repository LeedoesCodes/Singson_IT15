<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'My First Post',
            'content' => 'This is the content of my first post.',
            'author_name' => 'John Doe',
            'is_anonymous' => false,
        ]);

        Post::create([
            'title' => 'Second Post',
            'content' => 'Another post content here.',
            'author_name' => 'Jane Smith',
            'is_anonymous' => false,
        ]);

        Post::create([
            'title' => 'Anonymous Thoughts',
            'content' => 'This is posted anonymously.',
            'author_name' => null,
            'is_anonymous' => true,
        ]);
    }
}