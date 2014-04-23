<?php
/**
 * Base configuration settings.
 */

return array(
    'name' => 'Bold Card/Account Management API',
    'version' => 1,
    'sourceVersion' => '0.0.1',
    'environment' => 'dev',
    'debug' => false,
    'paths' => array(
        'app'       => realpath(__DIR__ . '/..') . '/',
        'cache'     => realpath(__DIR__ . '/../cache') . '/',
        'config'    => __DIR__ . '/',
        'logs'      => realpath(__DIR__ . '/../logs') . '/',
        'vendor'    => realpath(__DIR__ . '/../../vendor') . '/',
    ),
    'routes' => array(
        'Api\AccountManagement\Routes',
        'Api\TestApi\Routes',
    ),
);
