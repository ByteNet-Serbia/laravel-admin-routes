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
$factory->define(ByteNet\LaravelAdminRoutes\app\Route::class, function (Faker\Generator $faker) {

    $company = $faker->company;
    $active = $faker->boolean($chanceOfGettingTrue = 80);
    $description = $faker->boolean($chanceOfGettingTrue = 30);

    return [
        //'id' => $faker->id,
        'name' => $company,
        'alias' => str_slug($company),
        'active' => $active ? $faker->boolean($chanceOfGettingTrue = 80) : null,
        'description' => $description ? $faker->sentence : null,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(ByteNet\LaravelAdminRoutes\app\RouteTerminal::class, function (Faker\Generator $faker) {
    static $order = 0;

    return [
        'route_id' => factory(ByteNet\LaravelAdminRoutes\app\Route::class)->create()->id,
        'terminal_id' => factory(ByteNet\LaravelAdminTerminals\app\Terminal::class)->create()->id,
        'active' => $faker->boolean($chanceOfGettingTrue = 80) ? $faker->boolean($chanceOfGettingTrue = 80) : null,
        'order' => $order++,
        'arrive' => 0,
        'departure' => 0,
        'note' => $faker->boolean($chanceOfGettingTrue = 30) ? $faker->word : null,
    ];
});
