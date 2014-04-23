<?php

namespace Benchmark;

class Routes
{
    /**
     * @var \Silex\Application
     */
    private $app;

    public function __construct(Application $app = null)
    {
        if ($app) {
            $this->setApp($app);
        }
    }

    public function setApp(Application $app)
    {
        $this->app = $app;
        return $this;
    }

    public function getApp()
    {
        return $this->app;
    }


  /**
   * Register base endpoint.
   *
   * @return $this
   */
  public function register()
  {
    /*
        Root
    */
    $this->getApp()->get('/hello', 'Test\Controllers\DefaultController::hello');
    $this->getApp()->get('/simple', 'Test\Controllers\DefaultController::simple');
    $this->getApp()->get('/large', 'Test\Controllers\DefaultController::large');

    return $this;
  }

}
