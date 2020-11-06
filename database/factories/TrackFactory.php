<?php

namespace Database\Factories;

use App\Models\Track;
use App\Models\Release;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Track::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "release_id" => \App\Models\Release::factory(),
            "name" => $this->faker->word . " " . $this->faker->word,
            "artist_name" => $this->faker->word,
            "artist_features" => $this->faker->word,
            "description" => $this->faker->sentence,
            "bpm" => $this->faker->numberBetween(55, 190)
        ];
    }
}
