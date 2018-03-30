<?php

class Router
{
    private $routes;
    
    public function __construct()
    {
        $this -> routes = include(ROOT . '/config/Routes.php');
    }
    
    public function run()
    {
        echo $this -> routes;
    }
}