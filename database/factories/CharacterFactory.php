<?php

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

Storage::fake('images');

$factory->define(App\Character::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'fighting_style' => $faker->jobTitle,
        'nationality' => $faker->country,
        'background' => $faker->paragraph,
        'picture' => UploadedFile::fake()->image('test.jpg'),
        'notes' => $faker->paragraph
    ];
});
