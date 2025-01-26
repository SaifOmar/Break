<?php

namespace Break;

use Exception;

class Container
{
	protected array $bindings = [];

	public function bind(string $key, callable $resolver)
	{
		$this->bindings[$key] = $resolver;
	}

	public function reslove(string $key)
	{
		if (!array_key_exists($key, $this->bindings)) {
			throw new Exception("No service found named:" . $key);
		}
		return	call_user_func($this->bindings[$key]);
	}
}
