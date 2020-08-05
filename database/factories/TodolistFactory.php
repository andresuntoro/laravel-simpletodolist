<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todolist;
use Faker\Generator as Faker;

$factory->define(Todolist::class, function (Faker $faker) {
    return [
		'todo' => $faker->unique()->sentence(8, true),
		'status' => 0
	];
});
