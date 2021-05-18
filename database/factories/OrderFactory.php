<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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
        'shipping_id' => null,
        'created_at' => $this->faker->dateTimeBetween('+0 days', '+2 years')
      ];
    }
}
