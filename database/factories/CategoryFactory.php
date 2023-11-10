<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    private array $names = [
        "programming", "go", "misc", "security", "webdev", "shitpost"
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = array_rand($this->names);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
