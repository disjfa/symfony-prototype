<?php

namespace App\Faker;

use Faker\Provider\Base;

class UnsplashProvider extends Base
{
    public static function unsplashUrl($width = 640, $height = 480, $category = null)
    {
        $baseUrl = "https://source.unsplash.com/random/";
        $url = "{$width}x{$height}";

        $query = [];
        $query[] = 'sig=' . static::randomNumber(5, true);
        if ($category) {
            $query[] = $category;
        }

        return $baseUrl . $url . '?' . implode('&', $query);
    }
}
