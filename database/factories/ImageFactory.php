<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $faker = \Faker\Factory::create();
        $faker->addProvider(new ("\Smknstd\FakerPicsumImages\FakerPicsumImagesProvider")($faker));

        return [
            'url' => 'posts/' . $faker->image('public/storage/posts', 640, 480, false),
        ];

    }
}
