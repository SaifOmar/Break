<?php

use Break\App;


const BASE_PATH = __DIR__ . "/";

require  BASE_PATH . "vendor/autoload.php";

$uri = rtrim(parse_url($_SERVER["REQUEST_URI"])["path"], "/");

$method = $_SERVER["REQUEST_METHOD"];

$app = new App();

$app->Resolve($uri, $method);
