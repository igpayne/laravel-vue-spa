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
     * Creates 5 genres, then creates 3 releases for each genre, each with 5 tracks
     * Total: 75 Tracks, 15 releases, 5 genres
     * 
     * @return void
     */
    public function run()
    {
        $genres = [
            Genre::factory()->create(["name" => "Drum and Bass"]),
            Genre::factory()->create(["name" => "House"]),
            Genre::factory()->create(["name" => "Garage"]),
            Genre::factory()->create(["name" => "Techno"]),
            Genre::factory()->create(["name" => "Ambient"])
        ];

        foreach ($genres as $genre) {

            for ($i = 0; $i < 3; $i++)
            {
                $new_release = Release::factory()->create();

                $genre->releases()->save($new_release);

                Track::factory(5)->create(["release_id" => $new_release->id]);
            }
        }
    }
}
