<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id'=> $this->faker->randomDigit,
            'item_price'=> $this->faker->randomDigit,
            'qly'=> $this->faker->randomDigit,
        ];
    }
}
