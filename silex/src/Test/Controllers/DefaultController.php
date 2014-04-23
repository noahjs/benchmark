<?php
/**
 * Default controller for base endpoints.
 */

namespace Benchmark\Test\Controllers;

use Benchmark\Application;
use Benchmark\Controller;

class DefaultController extends Controller
{

  /**
   * hello
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function hello_world(Application $app)
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
  public function simple_select(Application $app)
  {
    $data = [];

    $data[] = Post::find(1);

    return $app->json($data);
  }

  /**
   * large, ORM intensive but using correct syntax
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function loop(Application $app)
  {
    $data = [];

    $data[] = Post::with('author')->where('author_id', '1');

    foreach( $posts as $post ){
      $data[] = $post->author->name." - ".$post->name;
    }

    return $app->json($data);
  }

}
