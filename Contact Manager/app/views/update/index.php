<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

require 'app/views/update/UpdateView.Class.php';

// if there is no id redirect to index.php
if(!isset($_GET['id'])) {
    header('Location: index.php');
}
// if action is present and the action is update
elseif(isset($_GET['action']) && $_GET['action'] === 'update'){
    // require update controller
    require_once 'app/controllers/UpdateController.php';
    // instantiate controller
    $update = new \update_control\UpdateController;
    // call updateContact method
    $update->updateContact();
}
// if no action build the default view
else{
    $view = new UpdateView('Update Contact');
    $view->buildDisplay();
    // unset the session to clear msg
    session_unset();
}

?>
