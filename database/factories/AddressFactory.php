<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'id' => $this->faker->numberBetween(1, 100),
        'city' => $this->faker->city,
        'country' => $this->faker->country,
        'phone_number' => $this->faker->numberBetween(10000000, 99999999),
        'user_id' => $this->faker->numberBetween(1, 100),
        'created_at' => $this->faker->dateTimeBetween('+0 days', '+2 years')
      ];
    }
}
