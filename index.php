<?php

use Break\DataBase;

const BASE_PATH = __DIR__ . "/";
session_start();


require BASE_PATH . "vendor/autoload.php";
//require BASE_PATH . "bootstrap.php";
$container = require BASE_PATH . "bootstrap.php";

$function = $container->resolve(function () {
    return "hello";

});
$controller = $container->resolve(DataBase::class);

var_dump($controller);
die();
//(require BASE_PATH . "bootstrap.php")->handleRequest(Request::createFromGlobals());

//$app->Resolve($request->uri(), $request->method());
