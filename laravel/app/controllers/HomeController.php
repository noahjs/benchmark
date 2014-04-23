<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function seed()
	{
    $faker = Faker\Factory::create();
    $authors = [];

    for( $i=0; $i< 5000; $i++ ){


      $author = new Author();
      $author->first_name	=	$faker->firstName;
      $author->middle_name  = $faker->firstName;
      $author->last_name  =	$faker->lastName;

      $author->phone  =	'1'.mt_rand(2222222222,7999999999);
      $author->birthdate  =	$faker->dateTimeBetween("-49 years", "-18 years")->format("Y-m-d");

      $author->address  =	$faker->streetAddress;
      $author->address2 =	$faker->secondaryAddress;
      $author->city =	$faker->city;
      $author->state  =	$faker->state;
      $author->zipcode  =	$faker->postcode;
      $author->countrycode=	"US";

      $author->save();
    }

    for( $i=0; $i< 100000; $i++ ){


      $post = new Post();
      $post->author_id	=	mt_rand(1,5000);

      $post->title    = $faker->realText(mt_rand(75,250));
      $post->content  = $faker->realText(mt_rand(400,5000));

      $post->save();

    }

		return 'Done';
	}

}
