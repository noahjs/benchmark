benchmark
=========

Project that will be used to test PHP benchmarks of multiple frameworks.
Currently this will simulate api reponses.

Setup
===
##Hosts
http://laravel.phpbenchmark.net

http://silex.benchmark

##Database:
-MySQL
-5,000 Authors
-100,000 Posts

#Tests

/hello
  Respond Hello World

/simple_select
  Query Post by Id
  get Author from post
  respond

/large
  Select 23 items (no limit) from Posts
  Run NOT OPTIMIZED ORM reference on each
  respond

##Install
Run bootstrap.sh, or write me a puppet config of it ;-)

https://github.com/noahjs/benchmark

#Testing Process
Time tracking:

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

##Results
