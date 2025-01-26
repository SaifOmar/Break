<?php

namespace Controllers;

use Break\Controller;


class HomeController extends Controller
{
    public function index(): null
    {
        $saif = "a7a get";
        return $this->view('home', compact('saif'));
    }

    public function store(): null
    {
        $email = $_POST['email'];
        $saif = "a7a post";
        return $this->view('home', compact('email', 'saif'));
    }
}
