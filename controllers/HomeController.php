<?php

namespace app\controllers;

use ryzen\framework\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render('welcome');
    }
}