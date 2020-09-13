<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;
use Gdr\SiteBundle\Loader\ApcuClassLoader;

umask(0000);
$loader = require __DIR__.'/../app/autoload.php';

// Use APC for autoloading to improve performance.
// Change 'sf2' to a unique prefix in order to prevent cache key conflicts
// with other applications also using APC.

$loader = new ApcuClassLoader('sfadm', $loader);
$loader->register(true);


// PROD
//require_once __DIR__.'/../app/AppCache.php';
//$kernel = new AppKernel('admin', false);
//$kernel->loadClassCache();
//$kernel = new AppCache($kernel);
//Request::enableHttpMethodParameterOverride();
//$request = Request::createFromGlobals();
//$response = $kernel->handle($request);
//$response->send();
//$kernel->terminate($request, $response);

//// DEV
$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('admin', true);
$kernel->loadClassCache();
Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
