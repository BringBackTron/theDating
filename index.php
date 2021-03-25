<?php

// George McMullen
// Mar 25 2021
// PHP index for my dating website

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once("vendor/autoload.php");

//create an instance of the base class
$f3 = Base::instance();

//set fat-free debugging
$f3->set('DEBUG', 3);

//Define a default route (home page)
$f3->route('GET /', function(){
    // render home.html
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a default route (login page)
$f3->route('GET /login', function(){
    // render home.html
    $view = new Template();
    echo $view->render('views/login.html');
});


$f3->run();