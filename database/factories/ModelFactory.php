<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\Tour::class, function(Faker $faker){
	$name_en = $faker->unique()->name;
	$tour_type_ids = \App\TourType::whereParentId(null)->select('id')->pluck('id')->toArray();
    $region_ids = \App\Region::all('id')->pluck('id')->toArray();
	return [
		'name_hy' => $faker->name,
		'name_en' => $name_en,
		'name_ru' => $faker->name,
		'desc_hy' => $faker->paragraph(30),
		'desc_en' => $faker->paragraph(30),
		'desc_ru' => $faker->paragraph(30),
		'region_id' => $faker->randomElement($region_ids),
        'sightseeing_place' => random_int(0, 1),
        'tour_type_id' => $faker->randomElement($tour_type_ids),
        'grid_image' => 'tour.jpg',
		'slug' => str_slug($name_en)
	];
});

$factory->define(App\VehicleType::class, function(Faker $faker){
    return [
        'name_hy' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
    ];
});

$factory->define(App\TourType::class, function(Faker $faker){
    return [
        'name_hy' => $faker->unique()->name,
        'name_en' => $faker->unique()->name,
        'name_ru' => $faker->unique()->name,
        'slug' => str_slug($faker->unique()->name),
        'image' => 'tour-type-image.jpg'
    ];
});

$factory->define(App\CarDriver::class, function(Faker $faker){
    $name_en = $faker->unique()->name;
    $vehicle_type_ids = \App\VehicleType::all('id')->pluck('id')->toArray();
    return [
        'name_hy' => $faker->name,
        'name_en' => $name_en,
        'name_ru' => $faker->name,
        'desc_hy' => $faker->paragraph(30),
        'desc_en' => $faker->paragraph(30),
        'desc_ru' => $faker->paragraph(30),
        'grid_image' => 'car.jpg',
        'slug' => str_slug($name_en),
        'with_driver' => random_int(0, 1),
        'num_of_seats' => random_int(0, 50),
//        'year_of_vehicle' => random_int(0, 50),
        'vehicle_type_id' => $faker->randomElement($vehicle_type_ids)
    ];
});

$factory->define(App\Restaurant::class, function(Faker $faker){
    $name_en = $faker->unique()->name;
    $region_ids = \App\Region::all('id')->pluck('id')->toArray();
    return [
        'name_hy' => $faker->name,
        'name_en' => $name_en,
        'name_ru' => $faker->name,
        'desc_hy' => $faker->paragraph(30),
        'desc_en' => $faker->paragraph(30),
        'desc_ru' => $faker->paragraph(30),
        'grid_image' => 'hotel.jpg',
        'slug' => str_slug($name_en),
        'address_hy' => $faker->address,
        'address_en' => $faker->address,
        'address_ru' => $faker->address,
        'region_id' => $faker->randomElement($region_ids)
    ];
});

$factory->define(App\Residence::class, function(Faker $faker){
    $name_en = $faker->unique()->name;
    $region_ids = \App\Region::all('id')->pluck('id')->toArray();
    return [
        'name_hy' => $faker->name,
        'name_en' => $name_en,
        'name_ru' => $faker->name,
        'desc_hy' => $faker->paragraph(30),
        'desc_en' => $faker->paragraph(30),
        'desc_ru' => $faker->paragraph(30),
        'grid_image' => 'hotel.jpg',
        'slug' => str_slug($name_en),
        'residence_type' => $faker->randomElement([\App\Residence::residence_type_apartment, \App\Residence::residence_type_hotel]),
        'address_hy' => $faker->address,
        'address_en' => $faker->address,
        'address_ru' => $faker->address,
        'region_id' => $faker->randomElement($region_ids)
    ];
});

$factory->define(App\Service::class, function(Faker $faker){
    $name_en = $faker->unique()->name;
    return [
        'name_hy' => $faker->name,
        'name_en' => $name_en,
        'name_ru' => $faker->name,
        'desc_hy' => $faker->paragraph(30),
        'desc_en' => $faker->paragraph(30),
        'desc_ru' => $faker->paragraph(30),
        'slug' => str_slug($name_en),
    ];
});

$factory->define(App\Vacancy::class, function(Faker $faker){
    $name_en = $faker->unique()->name;
    return [
        'name_hy' => $faker->name,
        'name_en' => $name_en,
        'name_ru' => $faker->name,
        'desc_hy' => $faker->paragraph(30),
        'desc_en' => $faker->paragraph(30),
        'desc_ru' => $faker->paragraph(30),
        'slug' => str_slug($name_en),
    ];
});

$factory->define(App\News::class, function(Faker $faker){
    $name_en = $faker->unique()->name;
    return [
        'name_hy' => $faker->name,
        'name_en' => $name_en,
        'name_ru' => $faker->name,
        'desc_hy' => $faker->paragraph(30),
        'desc_en' => $faker->paragraph(30),
        'desc_ru' => $faker->paragraph(30),
        'grid_image' => 'news.jpg',
        'slug' => str_slug($name_en),
    ];
});