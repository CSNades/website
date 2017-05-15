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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Nade::class, function (Faker\Generator $faker) {
    return [
        'map_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomNumber(),
        'type' => 'frag',
        'pop_spot' => $faker->randomElement(['a-site', 'b-site', 'mid', 'other']),
        'title' => $faker->text(20),
        'imgur_album' => $faker->url,
        'youtube' => $faker->url,
        'is_working' => $faker->boolean,
        'tags' => $faker->word,
        'approved_by' => factory(App\User::class),
        'approved_at' => $faker->dateTime(),
    ];
});

$factory->state(App\Models\Nade::class, 'approved', function (Faker\Generator $faker) {
    return [
        'approved_by' => factory(App\User::class),
        'approved_at' => $faker->dateTime(),
    ];
});

$factory->state(App\Models\Nade::class, 'unapproved', function (Faker\Generator $faker) {
    return [
        'approved_by' => null,
    ];
});

$factory->define(App\Models\Map::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'image' => $faker->word,
    ];
});
