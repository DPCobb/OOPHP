<?php
/*
 * PROJECT: Homework Week 3 Part 2: Develop FruitDB App
 * AUTHOR: Daniel Cobb
 * CREATED: 11/12/2016
 */

// Get the fruit of the day from the DB
 Require 'DBCred.php';
 $sth = $dbh->prepare("SELECT * FROM fruits ORDER BY RAND() LIMIT 1");
 // if the select is successful
 if($sth->execute()){
     $results = $sth->fetchAll();
     // json encode the results
     $results = json_encode($results);
 }
 else{
     echo 'Something is not right here.';
     exit();
 }
// echo back the results
 echo $results;

 ?>
