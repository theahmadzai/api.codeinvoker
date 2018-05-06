<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'url' => $faker->imageUrl(640, 480),
        'format' => $faker->fileExtension(),
        'size' => $faker->numberBetween(1000, 8000),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) use ($factory) {
    return [
        'image_id' => $factory->create(App\Image::class)->id,
        'author' => $faker->name(),
        'title' => $faker->sentence(7),
        'slug' => $faker->slug(),
        'readtime' => $faker->numberBetween(1, 30),
        'content' => $faker->text(1000),
    ];
});
