<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'id' => $this->faker->numberBetween(1, 100),
        'name' => $this->faker->name,
        'description' => $this->faker->realText(200),
        'slug' => $this->faker->slug,
        'created_at' => $this->faker->dateTimeBetween('+0 days', '+2 years')
      ];
    }
}
