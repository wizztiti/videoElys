<?php

use Faker\Generator as Faker;
use App\Models\Formation;

$factory->define(Formation::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'resume' => $faker->text,
        'slug' => $faker->slug,
        'teaser_path' => $faker->url,
        'price' => 40,
        'category_id' => 1,
    ];
});
