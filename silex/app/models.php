<?php

use \Illuminate\Database\Eloquent\Model as Model;

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