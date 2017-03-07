<?php
/*
 * PROJECT: Homework Week 3: Develop FruitDB App
 * AUTHOR: Daniel Cobb
 * CREATED: 11/13/2016
 */

class CreateData
{
    // Set the fruitname and fruitcolor variables to private
    private $fruitname;
    private $fruitcolor;
    private $fruitimg;

    function __construct()
    {
        // Sanitize and assign values to fruitname/fruitcolor from POST data
        $this->fruitname = filter_var($_POST['fruitname'], FILTER_SANITIZE_STRING);
        $this->fruitcolor = filter_var($_POST['fruitcolor'], FILTER_SANITIZE_STRING);
        $this->fruitimg = filter_var($_POST['fruitimage'], FILTER_SANITIZE_URL);
    }

    function createData()
    {
        // Require the DB connection file
        require 'DBCred.php';
        // Prepare the insert
        $sth = $dbh->prepare("INSERT INTO fruits (fruitname, fruitcolor, fruitimage) VALUES (:fruitname, :fruitcolor, :fruitimage)");
        // Bind the parameters
        $sth->bindParam(':fruitname', $this->fruitname);
        $sth->bindParam(':fruitcolor', $this->fruitcolor);
        $sth->bindParam(':fruitimage', $this->fruitimg);
        // Execute the insert
        $sth->execute();

    }
}

?>
