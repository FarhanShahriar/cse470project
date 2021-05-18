<?php

namespace Database\Factories;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'id' => $this->faker->numberBetween(1, 100),
        'user_id' => $this->faker->numberBetween(1, 100),
        'product_id' => $this->faker->numberBetween(1, 100),
        'order_id' => null,
        'created_at' => $this->faker->dateTimeBetween('+0 days', '+2 years')
      ];
    }
}
