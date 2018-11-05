<?php

use Faker\Generator as Faker;
use App\Models\Chapter;

$factory->define(Chapter::class, function (Faker $faker) {

    return [
        'num' => null,
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'text' => $faker->text,
        'slug' => $faker->slug,
        'formation_id' => 1
    ];
});
