<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word, // Kategoriya nomi uchun soxta ma'lumot
        ];
    }
}
