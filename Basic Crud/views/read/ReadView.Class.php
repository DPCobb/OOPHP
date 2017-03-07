<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

require './views/View.Class.php';
require './controllers/ReadController.php';
class ReadView extends View
{

    function __construct($title)
    {
        parent::__construct($title);
    }
    // Call the appropriate controller and build dashboard
    function contentBuild()
    {
        $data = new ReadController();
        echo $data->dashboard();
    }
    // build the full view and display it
    function buildDisplay()
    {
        $all = $this->createHeader() . $this->contentBuild() . $this->createFooter();
        echo $all;
    }
}

?>