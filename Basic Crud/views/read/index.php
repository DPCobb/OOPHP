<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

require './views/read/ReadView.Class.php';
// Build the view
$view = new ReadView('View User Details');
$view->buildDisplay();

?>