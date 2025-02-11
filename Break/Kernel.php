<?php

namespace Break;

class Kernel
{
    private Router $router;
    public function __construct(
        $router
    ) {}

    public function handleRequest(Request $request): Response
    {
        $content = $this->getContent($request->uri(), $request->method());
        return new Response($request->content(), $request->status(), $request->headers());
    }

    public function getContent(string $uri, string $method)
    {
        $router = new Router();
        require __dir__ . "/../routes/web.php";

        $array = $router->route($uri, $method);

        $controller = new $array[1]();
        $method = $array[2];
        $controller->$method();
    }

    public function handleException(\Exception $e)
    {
        echo $e->getMessage();
    }
}

