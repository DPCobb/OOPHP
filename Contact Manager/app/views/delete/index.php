<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

// require the view class
require 'app/views/delete/DeleteView.Class.php';

// if there is no id set then redirect to index.php
if(!isset($_GET['id'])) {
    header('Location: index.php');
}
// if action is set and is equal to delete
elseif(isset($_GET['action']) && $_GET['action'] === 'delete'){
    // require the delete controller
    require_once 'app/controllers/DeleteController.php';
    // instantiate DeleteController
    $delete = new \delete_control\DeleteController;
    // delete the contact
    $delete->deleteContact();
}
// build confirm form
else{
    // instansiate the view
    $view = new DeleteView('Delete Contact');
    // build the view
    $view->buildDisplay();
    // unset the session to remove alert msg
    session_unset();
}

?>
