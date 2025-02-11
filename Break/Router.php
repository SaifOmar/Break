<?php

namespace Break;


class Router
{
    public $routes = [];

    private $routePath = "../Routes/web.php";

    public function get(string $route, array $handles)
    {
        $this->add($route, "GET", $handles[0], $handles[1]);
    }

    public function routesPath(string $path): void
    {
        $this->routePath = $path;
    }
    private function add($uri, $method, $contorller, $function)
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $contorller,
            'function' => $function,
        ];
    }

    public function post(string $route, array $handles)
    {
        $this->add($route, "POST", $handles[0], $handles[1]);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && strtoupper($method) === $route["method"]) {
                return [
                    BASE_PATH . "controllers/" . $route["controller"] . ".php",
                    $route["controller"],
                    $route["function"],
                ];
            }
        }
    }
}

// function dd($var)
// {
// 	echo "<pre>";
// 	var_dump($var);
// 	echo "</pre>";
// 	die();
// }
