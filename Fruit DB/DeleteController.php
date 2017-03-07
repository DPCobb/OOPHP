<?php
/*
 * PROJECT: Homework Week 3: Develop FruitDB App
 * AUTHOR: Daniel Cobb
 * CREATED: 11/13/2016
 */

// Require the DeleteData.Class which interacts with the DB
require 'DeleteData.Class.php';
class DeleteController
{
    // set fruitid to public
    public $fruitid;

    function __construct()
    {

    }

    function deleteUser()
    {
        // if the url param id is not empty
        if(!empty($_GET['id'])) {
            // assign id to fruitid
            $this->fruitid = $_GET['id'];
            // create new instance of DeleteData.Class
            $data = new DeleteData($this->fruitid);
            // echo deleteData method results
            echo $data->deleteData($this->fruitid);
            // echo home button
            echo '<a href="fruitsad.php" class="button button-primary">Home</a>';
        }
        else {
            // If url param id is empty, redirect to fruitsad.php
            header('Location: fruitsad.php');
        }
    }

}

?>
