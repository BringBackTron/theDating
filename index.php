<?php

// George McMullen
// Mar 25 2021
// PHP index for my dating website

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once("vendor/autoload.php");

// Start a session
session_start();

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
    //var_dump($_POST);

    // Display a view
    $view = new Template();
    echo $view->render("views/info.html");
});

//Define an order2 route
$f3->route('POST /profile', function($f3) {
    //var_dump($_POST);

    // Add data from form1 to Session array
    if (isset($_POST['fName'])) {
        $_SESSION['fName'] = $_POST['fName'];
    }
    if (isset($_POST['lName'])) {
        $_SESSION['lName'] = $_POST['lName'];
    }
    if (isset($_POST['age'])) {
        $_SESSION['age'] = $_POST['age'];
    }
    if (isset($_POST['gender'])) {
        $_SESSION['gender'] = $_POST['gender'];
    }
    if (isset($_POST['phonenumber'])) {
        $_SESSION['phonenumber'] = $_POST['phonenumber'];
    }

    // Display a view
    $view = new Template();
    echo $view->render("views/profile.html");
});

//Define an order2 route
$f3->route('POST /interests', function($f3) {
    //var_dump($_POST);

    if (isset($_POST['email'])) {
        $_SESSION['email'] = $_POST['email'];
    }
    if (isset($_POST['state'])) {
        $_SESSION['state'] = $_POST['state'];
    }
    if (isset($_POST['sgender'])) {
        $_SESSION['sgender'] = $_POST['sgender'];
    }
    if (isset($_POST['biography'])) {
        $_SESSION['biography'] = $_POST['biography'];
    }

    // Display a view
    $view = new Template();
    echo $view->render("views/interests.html");
});

//Define a summary route
$f3->route('POST /summary', function() {

    $_SESSION['indoor'] = implode(", ", $_POST['indoor']);
    $_SESSION['outdoor'] = implode(", ", $_POST['outdoor']);

    //var_dump($_POST);

    //var_dump($_SESSION);

    // Display a view
    $view = new Template();
    echo $view->render("views/summary.html");
});


$f3->run();