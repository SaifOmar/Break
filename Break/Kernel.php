<?php

namespace Break;

class Kernel
{
    public function __construct()
    {

    }

    public function handleRequest(Request $request): Response
    {
        return new Response($request->content(), $request->status(), $request->headers());
    }
}