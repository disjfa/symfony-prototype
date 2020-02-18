<?php

namespace App\Faker;

use App\Model\News;
use Faker\Generator;

class NewsFaker
{
    /**
     * @var Generator
     */
    private $faker;

    /**
     * NewsFaker constructor.
     * @param Faker $faker
     */
    public function __construct(Faker $faker)
    {
        $this->faker = $faker->get();
    }

    /**
     * @param int $count
     * @return News[]
     */
    public function get(int $count = 10)
    {
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $news = new News();
            $news->setTitle($this->faker->sentence(3));
            $news->setIntro($this->faker->realText());
            $news->setDescription($this->faker->paragraphs);
            $news->setDatePublished($this->faker->dateTimeThisMonth());
            $news->setImage($this->faker->unsplashUrl(640, 480, 'cat'));
            $result[] = $news;
        }

        return $result;
    }
}
