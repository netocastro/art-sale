<?php

namespace Database\Seeders;

use App\Models\Art;
use Illuminate\Database\Seeder;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Art::factory(2)->create();
    }
}
