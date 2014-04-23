<?php

// Namespaces
use Illuminate\Database\Capsule\Manager as Capsule;

// ======================================================
// 				Setup the DB Connections
// ======================================================
use Symfony\Component\Yaml\Parser as YAMLParser;

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;


$capsule = new Capsule;

// Add each database connection from the config.
$capsule->addConnection('default', [
  'driver'   => 'mysql',
  'host'     => 'localhost',
  'database' => 'benchmark',
  'username' => 'root',
  'password' => 'root',
  'charset'  => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'  => ''
]);

// Set the event dispatcher used by Eloquent models... (optional)
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Set the cache manager instance used by connections... (optional)
//$capsule->setCacheManager(...);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
