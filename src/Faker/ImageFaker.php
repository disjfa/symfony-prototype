<?php

namespace App\Faker;

use Faker\Generator;

class ImageFaker
{
    /**
     * @var Generator
     */
    private $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker->get();
    }

    public function get(int $count = 6)
    {
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = [
                'name' => $this->faker->sentence(3),
                'caption' => $this->faker->realText(),
                'image' => 'https://source.unsplash.com/random/800x450?sig='.rand(0, 1500),
            ];
        }
        return $result;
    }
}
