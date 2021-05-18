<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

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
          'SKU' => $this->faker->numberBetween(100000, 999999),
          'price' => $this->faker->numberBetween(1000, 9999),
          'description' => $this->faker->realText(200),
          'quantity' => $this->faker->numberBetween(20, 100),
          'slug' => $this->faker->slug,
          'created_at' => $this->faker->dateTimeBetween('+0 days', '+2 years')
        ];
    }
}
