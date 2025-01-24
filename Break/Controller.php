<?php

namespace Break;

class Controller
{
	protected $path = BASE_PATH . "Views/";

	public function view(string $view, $params = null)
	{
		require_once($this->path . $view . ".php");
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			header("location:" . $_SERVER['HTTP_REFERER']);
		}
	}
	public function response(int $response)
	{
		http_response_code($response);
	}
}
