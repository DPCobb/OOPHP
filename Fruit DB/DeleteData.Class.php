<?php
/*
 * PROJECT: Homework Week 3: Develop FruitDB App
 * AUTHOR: Daniel Cobb
 * CREATED: 11/13/2016
 */


class DeleteData
{
    // Set id and msg vars
    private $id;
    public $msg;

    function __construct($id)
    {
        // assign values to vars id and msg
        $this->id = $id;
        $this->msg = '';
    }

    function deleteData(){
        // require db connection file
        require 'DBCred.php';
        // prepare the delete statement
        $sth = $dbh->prepare("DELETE FROM fruits WHERE id = :id");
        // bind params
        $sth->bindParam(':id', $this->id);
        // if execute is successful
        if($sth->execute()){
            // set msg to success
            $this->msg = '<h2>Entry successfully deleted.</h2>';
        }
        else{
            // if execute fails set msg to failure
            $this->msg = 'Delete failed.';
        }
        // return the msg
        return $this->msg;

    }
}

?>
