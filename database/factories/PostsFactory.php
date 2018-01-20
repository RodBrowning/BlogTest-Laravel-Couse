<?php

use Faker\Generator as Faker;


$factory->define(App\Post::class, function (Faker $faker) {
		
    	return 	[
		        	'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
		        	'body' 	=> $faker->sentence($nbWords = 100, $variableNbWords = true),
		        	'slug'	=> $faker->slug(2, true),
		        	'category_id' => $faker->numberBetween($min = 1, $max = 10),
		        	'created_at' => $faker->dateTimeBetween('-2 years', '-1 years', null),
		        	'updated_at' => $faker->dateTimeInInterval('-1 years', '+1 years', null)
        	    ];
});

