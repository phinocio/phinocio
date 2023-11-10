<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'summary' => $this->faker->sentence(10),
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(),
            'published_at' => $this->faker->dateTime(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
