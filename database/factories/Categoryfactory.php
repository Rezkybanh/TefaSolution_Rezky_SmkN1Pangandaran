<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->word;
        return [
            'name' => $name,
            'slug' => Str::slug($name . '-' . Str::random(5)), // Tambahkan ini untuk memastikan slug unik
            // Tambahkan atribut lainnya sesuai kebutuhan
        ];
    }
}