<?php

namespace Controllers;

use Break\Controller;


class HomeController extends Controller
{
	public function index()
	{
		return $this->view('home');
	}
	public function store()
	{
		$email = $_POST['email'];
		return $this->view('home', compact('email'));
	}
}
