<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

// require the view class
require 'app/views/index/IndexView.Class.php';

// if there is a post request
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // required file
    require_once 'app/controllers/CreateController.php';
    // if the posted data is not empty
    if(isset($_POST) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['web'])) {
        // instantiate CreateControl
        $action = new \create_control\CreateControl;
        // call createContact method
        $action->createContact();
    }
    // if something is missing display an error
    else{
        $_SESSION['msg'] = 'Looks like you are missing some form data, please try again.';
    }
}
// build the view
$view = new IndexView('Home');
$view->buildDisplay();
// unset the session
session_unset();

?>
