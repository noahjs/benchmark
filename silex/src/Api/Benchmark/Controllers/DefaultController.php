<?php
/**
 * Default controller for base endpoints.
 */

namespace Api\Benchmark\Controllers;

use Api\Application;
use Api\Controller;

/*
 * Mickey Mouse inclusion of Models
 */

class Author extends \Illuminate\Database\Eloquent\Model {
  protected $table = 'authors';
  public function posts()
  {
    return $this->hasMany('Post');
  }
}
class Post extends \Illuminate\Database\Eloquent\Model {
  protected $table = 'posts';
  public function author()
  {
    return $this->beongsTo('Author');
  }
}


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

    $posts = Post::with('author')->where('author_id', '1');

    foreach( $posts as $post ){
      $data[] = $post->author->name." - ".$post->name;
    }

    return $app->json($data);
  }


}
