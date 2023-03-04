<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'city' => $this->faker->city,
            'district' => $this->faker->city,
            'zipcode' => $this->faker->randomDigitNotZero(),
            'address' => $this->faker->address,
            'is_default' => $this->faker->boolean,
        ];
    }
}
