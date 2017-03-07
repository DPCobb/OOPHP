<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

class ReadData
{

    //get the data for a specific user using an id
    function getData($id)
    {
        include 'DBCred.php';

        $sth = $dbh->prepare("SELECT * FROM users101 WHERE id = :id");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    // get all user data
    function getAllData()
    {
        include 'DBCred.php';

        $sth = $dbh->prepare("SELECT * FROM users101");
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
}
?>