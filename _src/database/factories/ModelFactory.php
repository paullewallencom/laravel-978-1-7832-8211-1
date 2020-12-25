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


use Illuminate\Support\Facades\File;



$factory->define(App\Blog::class, function (Faker\Generator $faker) {
    return [
        'title' => "Blog Post " . rand(1, 1000),
        'mark_down' => $faker->sentence,
        'intro' => $faker->sentences($nb = 5, $asText = true),
        'html' => $faker->sentence,
        'active' => 1
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'twitter' => str_random(10),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'is_admin' => 0
    ];
});


$factory->define(App\LatestFavorite::class, function (Faker\Generator $faker) {
    
    $comic = json_decode(File::get(base_path('tests/fixtures/one_comic.json')), true);
    
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'favorite_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'comic' => $comic
    ];
});


$factory->define(App\Favorite::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'comic' => $faker->name
    ];
});



$factory->define(Laravel\Cashier\Subscription::class, function (Faker\Generator $faker) {
    return [
        'name' => \App\Plans::$LEVEL1,
        'stripe_id' => \App\Plans::$LEVEL1,
        'stripe_plan' => str_random(16),
        'quantity' => 1,
        'ends_at' => null,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\Profile::class, function (Faker\Generator $faker) {
    return [
        'favorite_comic_character' => $faker->name,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(\App\WishList::class, function (Faker\Generator $faker) {
    return [
        'comic_data' => [
            "title" => "Lorna the Jungle Girl (1954) #6",
            "urls" => [
                [
                    "type" => "detail",
                    "url" => "http://marvel.com/comics/issue/42882/lorna_the_jungle_girl_1954_6?utm_campaign=apiRef&utm_source=eeaef8ccb27b7aa1e20c80bd2f0d78a5"
                ],
                [
                    "type" => "reader",
                    "url" => "http://marvel.com/digitalcomics/view.htm?iid=26110&utm_campaign=apiRef&utm_source=eeaef8ccb27b7aa1e20c80bd2f0d78a5"
                ]
            ],
            "thumbnail" => [
                "path" => "http://i.annihil.us/u/prod/marvel/i/mg/9/40/50b4fc783d30f",
                "extension" => "jpg"
            ],
            "description" => "It's the origin of the original Avenger, Ant-Man! Hank Pym has been known by a variety of names - including Ant-Man, Giant-Man, Goliath and Yellowjacket - he's been an innovative scientist, a famed super hero, an abusive spouse and more. What demons drive a man like Hank Pym? And how did he begin his heroic career? "
        ],
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
