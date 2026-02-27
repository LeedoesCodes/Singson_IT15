<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
   public function run(): void
{
    Post::create([
        'title' => 'My First Post',
        'image' => null,
        'content' => 'This is the content of my first post.'
    ]);

    Post::create([
        'title' => 'Second Post',
        'image' => null,
        'content' => 'Another post content here.'
    ]);
}
}
