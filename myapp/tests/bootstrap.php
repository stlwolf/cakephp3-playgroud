<?php
/**
 * Test runner bootstrap.
 *
 * Add additional configuration/setup your application needs when running
 * unit tests in this file.
 */
require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/config/bootstrap.php';

// Load test routes
require dirname(__DIR__) . '/config/routes_test.php';

$_SERVER['PHP_SELF'] = '/';
