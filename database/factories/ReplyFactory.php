<?php

use Faker\Generator as Faker;

$factory->define(\App\Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->text,
        'question_id' => $faker->randomElement(\App\Question::all()),
        'user_id' => $faker->randomElement(\App\User::all()),
    ];
});
