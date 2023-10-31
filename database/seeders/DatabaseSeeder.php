<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws \Exception
     */
    public function run(): void
    {
        //         \App\Models\User::factory(10)->create();
        $posts = Post::factory(10)->create();
        $categories = Category::factory(5)->create();

        foreach ($posts as $post) {
            $numCat = random_int(1, 5);
            $post->categories()->sync(Category::factory($numCat)->create());
        }
    }
}
