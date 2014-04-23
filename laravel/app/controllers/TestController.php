<?php

class TestController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	|  Test Controller
	|--------------------------------------------------------------------------
	|
	| This controller contains the tests used for the benchmark app
	|
	*/

  /**
   * hello world
   */
  public function hello_world()
  {
    $data = [];

    $data[] = 'Hello World';

    return json_encode($data);
  }

  /**
   * simple, single ORM Query
   */
  public function simple_select()
  {
    $data = [];

    $data[] = Post::find(1)->toArray();

    return json_encode($data);
  }

  /**
   * large, ORM intensive but using correct syntax
   */
  public function loop()
  {
    $data = [];

    $posts = Post::with('author')->where('author_id', '1')->get();

    foreach( $posts as $post ){
      $data[] = $post->author->name." - ".$post->name;
    }

    return json_encode($data);
  }

}
