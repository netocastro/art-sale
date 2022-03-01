<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'text_email' => $this->faker->text(),
            'whatsapp' => $this->faker->phoneNumber(),
            'read' => random_int(0,1)
        ];
    }
}
