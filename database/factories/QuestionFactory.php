<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(App\Question::class, function (Faker $faker) {

    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'body' => $faker->text,
        'category_id' => $faker->randomElement(\App\Category::all()),
        'user_id' => $faker->randomElement(\App\User::all()),
    ];
});
