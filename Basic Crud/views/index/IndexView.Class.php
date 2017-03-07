<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

require './views/View.Class.php';
require './controllers/IndexController.php';
class IndexView extends View
{

    function __construct($title)
    {
        parent::__construct($title);
    }
    // Calls the needed controller and executes the dashboard
    function contentBuild()
    {
        $data = new IndexController();
        echo $data->dashboard();
    }
    // Builds and returns the view
    function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}

?>