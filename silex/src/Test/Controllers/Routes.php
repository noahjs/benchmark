<?php


namespace Api\AccountManagement;

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
        $this->getApp()->get('/hello', 'Test\Controllers\DefaultController::hello');
        $this->getApp()->get('/simple', 'Test\Controllers\DefaultController::simple');
        $this->getApp()->get('/large', 'Test\Controllers\DefaultController::large');

        return $this;
    }

}
