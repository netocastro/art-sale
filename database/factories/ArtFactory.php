<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ArtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
 
        return [
            "user_id" => User::all()->random()->id, 
            "directory" => 'faker/teste.jpg',//$this->faker->image($filePath, 300, 480), // falta colocar um path para o diretorio storange pra pegar imagens reais
            "name" => $this->faker->unique()->name(),
            "description" => $this->faker->text(50),
            "category_id" => Category::all()->random()->id,
            "rate" => random_int(1, 5),
            "price" => $this->faker->randomFloat(2, 50, 300),
            "price_per_person" => random_int(10, 100),
            "more_person" => random_int(1, 10),
            "discount" => random_int(0, 100)
        ];
    }
}
