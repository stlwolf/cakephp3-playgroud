<?php

// In config/routes_test.php

use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::scope('/', function (RouteBuilder $routes) {
    // Add this line to parse JSON request data
    $routes->registerMiddleware('bodyParser', new BodyParserMiddleware());
    $routes->applyMiddleware('bodyParser');

//    $routes->connect('/test-posts', ['controller' => 'TestPosts', 'action' => 'index', 'plugin' => false]);

    $routes->resources("TestPosts");
});
