<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

require './models/Views.Class.php';

// Instantiate class for view logic
$view = new Views();

// View is decided on by index.php?p=[page]
// If p is not empty decide on view to display
if (!empty($_GET['p']))
{
    // Use switch/case to decide what p is and what view needs to be displayed
    switch ($_GET['p'])
    {
        case 'read':
            $view->displayView('read/index');
            break;
        default:
            $view->displayView('index/index');
            break;
    }
}
// If there is no p value show the default, index.php
else
{
    $view->displayView('index/index');
}


?>