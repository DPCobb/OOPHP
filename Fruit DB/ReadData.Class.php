<?php
/*
 * PROJECT: Homework Week 3: Develop FruitDB App
 * AUTHOR: Daniel Cobb
 * CREATED: 11/13/2016
 */

class ReadData
{
    // Get a specific entry
    function getData($id)
    {
        //require db connection
        require 'DBCred.php';
        //prepare the statement
        $sth = $dbh->prepare("SELECT * FROM fruits WHERE id = :id");
        // bind the params
        $sth->bindParam(':id', $id);
        //execute
        $sth->execute();
        // set results to all returned results from select
        $result = $sth->fetchAll();
        // return results
        $result = json_encode($result);
        return $result;
    }

    // get all the db entries
    function getAllData()
    {
        // require db connection file
        require 'DBCred.php';
        // prepare select
        $sth = $dbh->prepare("SELECT * FROM fruits");
        // execute select
        $sth->execute();
        // results equal to all results returned
        $result = $sth->fetchAll();
        // return results
        $result = json_encode($result);
        return $result;
    }
}
?>
