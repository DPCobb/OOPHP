<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

class Views
{
    public function displayView($filename="", $result=array())
    {
        $file = 'app/views/' . $filename . '.php';
        include $file;
    }
}

?>
