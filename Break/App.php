<?php

namespace Break;


class App
{
    public static Container $container;
    public static Kernel $kernel;
    private static Router $router;


    public function __construct()
    {
        self::$container = new Container();
        // self::$kernel = self::resolve(Kernel::class);
        self::$router = self::resolve(Router::class);
        self::$kernel = new Kernel(self::$router);
    }
    public static function withRouting(string $routesPath): void
    {
        self::$router->routesPath($routesPath);
    }

    public static function resolve(string|callable $abstract)
    {
        return self::$container->resolve($abstract);
    }

    public static function handleRequest(Request $request): void
    {
        $response = self::$kernel->handleRequest($request);
        $response->send();
    }
    public static function bind(string  $abstract, string|callable $concrete)
    {

        return self::$container->bind($abstract, $concrete);
    }
}
