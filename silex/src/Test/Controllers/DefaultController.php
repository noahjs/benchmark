<?php
/**
 * Default controller for base endpoints.
 */

namespace Api\AccountManagement\Controllers;

use Api\Application;
use Api\Controller;

class DefaultController extends Controller
{

  /**
   * hello
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function hello(Application $app)
  {
    $data = [];

    $data[] = 'Hello';

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
    $data = [];

    $data[] = Post::find(1);

    return $app->json($data);
  }

  /**
   * large, ORM intensive
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function large(Application $app)
  {
    $data = [];

    $posts = Post::where('author_id', '1');

    foreach( $posts as $post ){
      $data[] = $post->author->name." - ".$post->name;
    }
    return $app->json($data);
  }

  /**
   * large, ORM intensive but using correct syntax
   *
   * @param Application $app
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function correct(Application $app)
  {
    $data = [];

    $data[] = Post::with('author')->where('author_id', '1');

    foreach( $posts as $post ){
      $data[] = $post->author->name." - ".$post->name;
    }

    return $app->json($data);
  }

}
