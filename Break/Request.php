<?php

namespace Break;

class Request
{
    public function __construct(
        public readonly array $getParams = [],
        public readonly array $postParams = [],
        public readonly array $cookies = [],
        public readonly array $files = [],
        public readonly array $server = [],
        public readonly array $headers = [],
    ) {}

    public static function createFromGlobals(): static
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
    }
    public function all()
    {
        return $this->post();
    }
    /**
     * @param $param
     * @return mixed
     */
    public function post($param = null): mixed
    {
        if ($param) {
            return $this->postParams[$param] ?? null;
        }
        return $this->postParams;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->getParams;
    }

    /**
     * @return string
     */
    public function uri(): string
    {
        return rtrim(parse_url($_SERVER["REQUEST_URI"])["path"], "/");
    }

    /**
     * @return mixed
     */
    public function url(): string
    {
        return $this->server['REQUEST_URI'];
    }

    /**
     * @return mixed
     */
    public function fullUrl(): string
    {
        return $this->server['REQUEST_URI'];
    }

    /**
     * @return string
     */
    public function content(): string
    {
        return "Hello My Master : Saif";
    }

    /**
     * @return int
     */
    public function status(): int
    {
        return 200;
    }

    /**
     * @return array
     */
    public function headers(): array
    {
        return $this->headers;
    }

    /**
     * @param string $method
     * @return bool
     */
    public function isMethod(string $method): bool
    {
        return $this->method() === $method;
    }

    /**
     * @return mixed
     */
    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}
