<?php

namespace App\Faker;

use Faker\Factory;
use Faker\Generator;
use Symfony\Component\HttpFoundation\RequestStack;

class Faker
{
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @return Generator
     */
    public function get()
    {
        $faker = Factory::create($this->requestStack->getCurrentRequest()->getLocale());
        $faker->addProvider(new UnsplashProvider($faker));
        return $faker;
    }
}
