<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker){
    return [
        'title' => $faker->title(),
        'publication_date' => $faker->publication_date(),
        'description' => $faker->description(),
        'pages' => $faker->pages()
    ];
});