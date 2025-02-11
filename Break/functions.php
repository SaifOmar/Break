<?php

namespace Break;

function dd($var)
{
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
	die();
}
