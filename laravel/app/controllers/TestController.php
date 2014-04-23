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
  public function hello()
  {
    define('FRAMEWORK_CONTROLLER_START', microtime(true));

    $data = [];

    $data[] = 'Hello World';

    define('FRAMEWORK_CONTROLLER_COMPLETE', microtime(true));

    return Response::json($this->times());
  }

  /**
   * simple, single ORM Query
   */
  public function simple()
  {
    define('FRAMEWORK_CONTROLLER_START', microtime(true));

    $data = [];

    $data[] = Post::find(1)->toArray();

    define('FRAMEWORK_CONTROLLER_COMPLETE', microtime(true));

    return Response::json($this->times());
  }

  /**
   * large, ORM intensive but using correct syntax
   */
  public function large()
  {
    define('FRAMEWORK_CONTROLLER_START', microtime(true));

    $data = [];

    $posts = Post::with('author')->where('author_id', '1')->get();

    foreach( $posts as $post ){
      $data[] = $post->author->first_name." ".$post->author->last_name." - ".$post->title;
    }

    define('FRAMEWORK_CONTROLLER_COMPLETE', microtime(true));

    return Response::json($this->times());
  }

  function times(){
    /*
    FRAMEWORK_START

    FRAMEWORK_VENDOR_START
    FRAMEWORK_VENDOR_COMPLETE

    FRAMEWORK_CONTROLLER_START
    FRAMEWORK_CONTROLLER_COMPLETE
    */
    return [
      'total'     => FRAMEWORK_CONTROLLER_COMPLETE - FRAMEWORK_START,
      'framework' => FRAMEWORK_CONTROLLER_START - FRAMEWORK_START,
      'vendor'    => FRAMEWORK_VENDOR_COMPLETE - FRAMEWORK_VENDOR_START,
      'controller'=> FRAMEWORK_CONTROLLER_COMPLETE - FRAMEWORK_CONTROLLER_START,
    ];
  }

}
