<?php

namespace Database\Factories;

use App\Models\Art;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number_people' => random_int(0,10),
            'user_id' => User::all()->random()->id,
            'art_id' => Art::all()->random()->id,
            'note' => $this->faker->text(100),
            'price' => $this->faker->randomFloat(2,50,300),
            'reference_photo_directory' => "images/manga/imag1.jfif",
            'delivered' => random_int(0,1),
            'deadline' => random_int(1,30)
        ];
    }
}
