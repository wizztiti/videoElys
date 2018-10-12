<?php

use Faker\Generator as Faker;
use App\Models\Tag;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => str_random(8),
        'slug' => $faker->slug,
    ];
});
