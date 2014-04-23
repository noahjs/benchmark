<?php
/**
 * Default controller for base endpoints.
 */

namespace Api\Benchmark\Controllers;

use Api\Application;
use Api\Controller;

use Author;
use Post;


class DefaultController extends Controller
{

    /**
     * Return stats info API.
     *
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function index(Application $app)
    {
        return $app->json(array(
            'name'      => $app['config']['name'],
            'version'   => $app['config']['version'],
            'source'    => $app['config']['sourceVersion'],
            'env'       => $app['environment'],
            'debug'     => $app['debug'],
        ));
    }


   /**
   * hello
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function hello(Application $app)
  {
    define('FRAMEWORK_CONTROLLER_START', microtime(true));
    $data = [];

    $data[] = 'Hello World';

    define('FRAMEWORK_CONTROLLER_COMPLETE', microtime(true));

    return $app->json($this->times());
  }

  /**
   * simple, single ORM Query
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function simple(Application $app)
  {
    define('FRAMEWORK_CONTROLLER_START', microtime(true));

    $post = Post::find(1);

    // ORM Query
    $post->author;

    define('FRAMEWORK_CONTROLLER_COMPLETE', microtime(true));

    return $app->json($this->times());
  }

  /**
   * large, ORM intensive but using correct syntax
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function large(Application $app)
  {
    define('FRAMEWORK_CONTROLLER_START', microtime(true));

    $data = [];

    $posts = Post::where('author_id', '1')->get();

    foreach( $posts as $post ){
      $data[] = $post->author->first_name." ".$post->author->last_name." - ".$post->title;
    }

    define('FRAMEWORK_CONTROLLER_COMPLETE', microtime(true));

    return $app->json($this->times());
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
