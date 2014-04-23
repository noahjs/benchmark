<?php

namespace Api;

use \Illuminate\Database\Eloquent\Model as Model;


class Application extends \Silex\Application
{}


/*
 * Mickey Mouse inclusion of Models
 */

class Author extends Model {
  protected $table = 'authors';
  public function posts()
  {
    return $this->hasMany('Post');
  }
}
class Post extends Model {
  protected $table = 'posts';
  public function author()
  {
    return $this->belongsTo('Author');
  }
}