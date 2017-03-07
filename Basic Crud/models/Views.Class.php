<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */
class Views
{
    // decides which view to use
    function displayView($filename="", $result=array())
    {
        $file = './views/' . $filename . '.php';
        include $file;
    }
}
?>