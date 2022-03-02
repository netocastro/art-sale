<?php

namespace Database\Seeders;

use App\Models\Art;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\ReferencePhoto;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'nick' => 'Admin',
            'email' => 'admin@art.com.br',
            'cpf' => '000.111.222-33',
            'password' => Hash::make('123')
        ]);
        User::factory(10)->create();
        Contact::factory(10)->create();
        Category::factory(6)->create();
        Art::factory(2)->create();
        Order::factory(10)->create();
    }
}
