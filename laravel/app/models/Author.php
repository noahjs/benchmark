<?php

class Author extends Eloquent {

	protected $table = 'authors';


  public function posts()
  {
    return $this->hasMany('Post');
  }

}
