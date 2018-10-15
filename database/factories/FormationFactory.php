<?php

use Faker\Generator as Faker;
use App\Models\Formation;

$factory->define(Formation::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'resume' => $faker->text,
        'slug' => $faker->slug,
        'teaser_path' => $faker->url,
        'category_id' => 1,
    ];
});
