<?php

namespace Database\Factories;

use App\Models\Release;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReleaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Release::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word . " " . $this->faker->word,
            "artist_name" => $this->faker->word,
            "description" => $this->faker->sentence,
            "release_date" => $this->faker->dateTimeBetween($startDate = "0 years", $endDate = "+10 years")
        ];
    }
}
