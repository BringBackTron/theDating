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

//Define an order route
$f3->route('GET|POST /info', function($f3) {
    // Display a view
    $view = new Template();
    echo $view->render("views/info.html");
});

//Define an order2 route
$f3->route('POST /profile', function($f3) {
    // Display a view
    $view = new Template();
    echo $view->render("views/profile.html");
});

//Define an order2 route
$f3->route('POST /interests', function($f3) {
    // Display a view
    $view = new Template();
    echo $view->render("views/interests.html");
});

//Define a summary route
$f3->route('POST /summary', function() {
    //var_dump($_POST);
    //echo "<br>";

    /* Add data from form2 to Session array
    if (!empty($_POST['name'])) {
        $_SESSION['name'] = $_POST['name'];
    }
    $_SESSION['size'] = $_POST['size'];
    $_SESSION['accessories'] = implode(", ", $_POST['accessories']);
    //var_dump($_SESSION);

    */

    // Display a view
    $view = new Template();
    echo $view->render("views/summary.html");
});


$f3->run();