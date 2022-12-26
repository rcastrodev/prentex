<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\Model;
use App\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
        'brand_id'  => function () {
            return Brand::inRandomOrder()->first()->id;
        },
        'category_id'  => 2,
        'sub_category_id'  => rand(1,2),
        'name'  => $name,
        'slug'  => Str::of($name)->slug('-'),
        'description'  => $faker->paragraph(),
    ];
});
