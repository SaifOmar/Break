<?php

namespace Break;


class App
{
	protected static $webPath =  BASE_PATH . 'routes/web.php';


	public static function Resolve(string $uri, string $method)
	{
		$router = new Router();
		require App::$webPath;
		App::startController($router->route($uri, $method));
	}
	protected static function startController(array $array)
	{

		$controller =  new $array[1]();
		$method = $array[2];
		$controller->$method();
	}
}
