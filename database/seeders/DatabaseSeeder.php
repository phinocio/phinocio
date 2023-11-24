<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Exception;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws Exception
     */
    public function run(): void
    {
        //         \App\Models\User::factory(10)->create();
        //        $posts = Post::factory(10)->create();
        //
        //        $names = [
        //            "programming", "go", "misc", "security", "webdev", "shitpost"
        //        ];
        //
        //        // This is cursed af and I wish factories had a firstOrCreate() method
        //        foreach ($posts as $post) {
        //            $numCat = random_int(1, sizeof($names));
        //            $categories = [];
        //            for ($i = 0; $i <= $numCat; $i++) {
        //                $name = $names[array_rand($names)];
        //                $categories[] = Category::firstOrCreate(['name' => $name, 'slug' => Str::slug($name)])->id;
        //            }
        //            $post->categories()->sync(array_unique($categories));
        //        }

//        Project::factory(3)->create();
        $this->call([
            UserSeeder::class,
        ]);
    }
}
