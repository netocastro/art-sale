<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'nick' => $this->faker->firstName(),
            'profile_photo_path' => "images/manga/imag1.jfif",
            'cpf' => $this->faker->randomNumber(3, true) . "." 
            . $this->faker->randomNumber(3, true) . "." 
            . $this->faker->randomNumber(3, true) . "-" 
            . $this->faker->randomNumber(2, true)
        ];
    }

}
