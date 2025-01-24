<?php

namespace Routes;

use Controllers\HomeController;


$router->get("", [HomeController::class, "index"]);
$router->post("", [HomeController::class, "store"]);
$router->get("/saif", [HomeController::class, "index"]);
$router->post("/saif", [HomeController::class, "store"]);


// Router::post("/", "controller");
