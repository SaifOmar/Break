<?php

namespace Break;

class Controller
{
	protected $path = BASE_PATH . "Views/";

	public function view(string $view, $params = null)
	{
		if (isset($params)) {
			foreach ($params as $key => $value) {
				$$key = $value;
			}
		}
		require($this->path . $view . ".php");
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			unset($_SESSION["_post_data"]);
			$_SESSION["_post_data"] = $_POST;
			header("location:" . $_SERVER['PHP_SELF']);
			exit();
		}
	}
	public function response(int $response)
	{
		http_response_code($response);
	}
}
