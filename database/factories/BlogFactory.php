<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'id' => $this->faker->numberBetween(1, 100),
        'title' => $this->faker->title,
        'description' => $this->faker->realText(200),
        'author' => $this->faker->name,
        'created_at' => $this->faker->dateTimeBetween('+0 days', '+2 years')
      ];
    }
}
