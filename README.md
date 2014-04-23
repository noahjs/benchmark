benchmark
=========

Project that will be used to test PHP benchmarks of multiple frameworks.
Currently this will simulate api reponses.

#Tests
/helloworld
  -No Database
  Respond Hello World

/simple_select
  - Database has 1 item
  Do simple select from DB

/loop
  - Database has 100,000 items
  Select 1,000 items, and run ORM reference in a loop


##Install
Run bootstrap.sh, or write me a puppet config of it ;-)

##Hosts
laravel.benchmark
silex.benchmark


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
      'vendor'    => FRAMEWORK_VENDOR_COMPLETE - FRAMEWORK_VENDOR_START,
      'controller'=> FRAMEWORK_CONTROLLER_COMPLETE - FRAMEWORK_CONTROLLER_START,
    ];

##Results
