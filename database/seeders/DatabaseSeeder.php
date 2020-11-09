<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Release;
use App\Models\Track;
use App\Models\Genre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory()->create(["name" => "Drum and Bass"]);
        Genre::factory()->create(["name" => "Dubstep"]);
        Genre::factory()->create(["name" => "Garage"]);
        Genre::factory()->create(["name" => "Techno"]);
        Genre::factory()->create(["name" => "Ambient"]);

        Track::factory(10)->create();

        //App\Models\User::factory(10)->create();
    }
}
