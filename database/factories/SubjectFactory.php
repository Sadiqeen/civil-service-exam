<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    $dt = $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now');

    return [
        'name' => $faker->name,
        'year' => $dt->format("Y"),
    ];
});
