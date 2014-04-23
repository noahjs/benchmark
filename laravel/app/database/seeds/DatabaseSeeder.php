<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

    $faker = Faker\Factory::create();

    /*
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
    */

    for( $i=0; $i< 100000; $i++ ){


      $post = new Post();
      $post->author_id	=	mt_rand(1,5000);

      $post->title    = $faker->text(mt_rand(75,250));
      $post->content  = $faker->text(mt_rand(400,5000));

      $post->save();

    }

	}

}
