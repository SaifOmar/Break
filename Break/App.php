<?php

namespace Break;


class App
{
    // protected static $webPath = BASE_PATH . 'routes/web.php';

    private static $container = new Container();
    private static $kernel = new Kernel();


    public static function resolve(string $abstract)
    {
        return App::$container->resolve($abstract);
    }

    public static function handleRequest(Request $request): void
    {
        $response = App::$kernel->handleRequest($request);
        $response->send();
    }
}
