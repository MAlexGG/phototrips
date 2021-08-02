<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'description' => $this->faker->text($maxnbchars = 255),
            'photo' => $this->faker->image(),
            'continent' => $this->faker->colorName(),
            'country' => $this->faker->country(),
            'date' => $this->faker->dateTime(),
        ];
    }
}
