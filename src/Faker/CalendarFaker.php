<?php

namespace App\Faker;

use DateTime;
use Faker\Generator;

class CalendarFaker
{
    /**
     * @var Generator
     */
    private $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker->get();
    }

    public function get(DateTime $start, DateTime $end, int $count = 6)
    {
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $result[] = [
                'id' => uniqid(),
                'title' => implode(' ', $this->faker->words),
                'start' => $this->faker->dateTimeBetween($start, $end)->format(DATE_ISO8601),
            ];
        }
        return $result;
    }
}
