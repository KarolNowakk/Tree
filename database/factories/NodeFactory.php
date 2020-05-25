<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Node;
use Faker\Generator as Faker;

$factory->define(Node::class, function (Faker $faker) {
    return [
        'value' => random_int(1, 100),
        'description' => $faker->sentence(random_int(1, 4)),
        'order' => random_int(1, 100),
    ];
});
