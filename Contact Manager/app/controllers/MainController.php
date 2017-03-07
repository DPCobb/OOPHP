<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

// required files
require 'app/models/Views.Class.php';

// create an instance of View class
$view = new Views();

// if p is set and is not empty enter the switch
if(isset($_GET['p']) && !empty($_GET['p'])) {
    switch ($_GET['p']) {
        // main page
        case 'index' :
            $view->displayView('index/index');
            break;
        // update page
        case 'update' :
            $view->displayView('update/index');
            break;
        // delete confirmation
        case 'delete' :
            $view->displayView('delete/index');
            break;
        // main page
        default:
            $view->displayView('index/index');
            break;
    }
}
// if p is not set or is empty build the default view
else{
    $view->displayView('index/index');
}
 ?>
