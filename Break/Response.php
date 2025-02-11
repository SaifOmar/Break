<?php

namespace Break;

class Response
{
    private const STATUS_OK = 200;
    private const STATUS_NOT_FOUND = 404;
    private const STATUS_INTERNAL_SERVER_ERROR = 500;
    private const STATUS_BAD_REQUEST = 400;
    private const STATUS_UNAUTHORIZED = 401;
    private const STATUS_FORBIDDEN = 403;

    /**
     * @param string|null $content
     * @param int $status
     * @param array $headers
     */
    public function __construct(
        private ?string $content = '',
        private int     $status = 200,
        private array   $headers = [],
    ) {}

    /**
     * @return void
     */
    public function send()
    {
        echo $this->content;
    }

    /**
     * @param int $status
     * @return void
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @param array $headers
     * @return void
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param string $uri
     * @return void
     */
    public function redirect(string $uri)
    {
        $this->header('Location', $uri);
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function header(string $key, string $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * @param array $data
     * @return void
     */
    public function json(array $data)
    {
        $this->header('Content-Type', 'application/json');
        $this->setContent(json_encode($data));
    }

    /**
     * @param string $content
     * @return void
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }
}

