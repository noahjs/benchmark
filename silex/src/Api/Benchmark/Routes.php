<?php


namespace Api\Benchmark;

class Routes extends \Api\Routes
{

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
        $this->getApp()->get('/', 'Api\Benchmark\Controllers\DefaultController::index');\

        $this->getApp()->get('/hello', 'Api\Benchmark\Controllers\DefaultController::hello');
        $this->getApp()->get('/simple', 'Api\Benchmark\Controllers\DefaultController::simple');
        $this->getApp()->get('/large', 'Api\Benchmark\Controllers\DefaultController::large');

        return $this;
    }

}
