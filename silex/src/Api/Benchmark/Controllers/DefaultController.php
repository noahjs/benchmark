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
    $data = [];

    $data[] = 'Hello World';

    return $app->json($data);
  }

  /**
   * simple, single ORM Query
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function simple(Application $app)
  {

    $post = Post::find(1);

    // ORM Query
    $post->author;

    return $app->json($post->toArray());
  }

  /**
   * large, ORM intensive but using correct syntax
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function large(Application $app)
  {
    $data = [];

    $posts = Post::where('author_id', '1')->get();

    foreach( $posts as $post ){
      $data[] = $post->author->name." - ".$post->name;
    }

    return $app->json($data);
  }


}
