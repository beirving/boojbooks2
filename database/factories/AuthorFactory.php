<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker){
    return [
        'name' => $faker->name(),
        'birthday' => $faker->birthday(),
        'biography' => $faker->biography()
    ];
});