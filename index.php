<?php

use Break\DataBase;
use Break\Request;


const BASE_PATH = __DIR__ . "/";
session_start();


require BASE_PATH . "vendor/autoload.php";
// require BASE_PATH . "bootstrap.php";
$app = require BASE_PATH . "bootstrap.php";
//
$function = $app->resolve(function () {
	return "hello";
});
$app->resolve(DataBase::class);
// $users = DataBase::table("users")->all();
// $app->resolve();
$response = $app->handleRequest(Request::createFromGlobals());

var_dump($response);
exit;
//(require BASE_PATH . "bootstrap.php")->handleRequest(Request::createFromGlobals());

//$app->Resolve($request->uri(), $request->method());
