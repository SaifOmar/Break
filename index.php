<?php

use Break\App;
use Break\Kernel;
use Break\Request;

session_start();

const BASE_PATH = __DIR__ . "/";

require BASE_PATH . "vendor/autoload.php";


$app = new App();
$kernel = new Kernel();
$response = $kernel->handleRequest(Request::createFromGlobals());
$response->send();

//$app->Resolve($request->uri(), $request->method());
