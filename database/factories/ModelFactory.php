<?php

use App\User;
use App\Models\Map;
use App\Models\Nade;

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
        'is_mod' => $faker->boolean,
        'is_admin' => $faker->boolean,
        'active' => $faker->boolean,
        'remember_token' => $faker->text(32),
    ];
});

$factory->define(Nade::class, function (Faker\Generator $faker) {
    return [
        'map_id' => factory(Map::class),
        'user_id' => factory(User::class),
        'type' => 'frag',
        'pop_spot' => $faker->randomElement(['a-site', 'b-site', 'mid', 'other']),
        'title' => $faker->text(20),
        'imgur_album' => $faker->url,
        'youtube' => $faker->url,
        'is_working' => $faker->boolean,
        'tags' => $faker->word,
        'approved_by' => factory(User::class),
        'approved_at' => $faker->dateTime(),
    ];
});

$factory->state(Nade::class, 'approved', function (Faker\Generator $faker) {
    return [
        'approved_by' => factory(User::class),
        'approved_at' => $faker->dateTime(),
    ];
});

$factory->state(Nade::class, 'unapproved', function (Faker\Generator $faker) {
    return [
        'approved_by' => null,
    ];
});

$factory->define(Map::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'image' => $faker->word,
    ];
});
