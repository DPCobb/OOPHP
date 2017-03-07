<?php
/*
 * PROJECT: Homework Week 3: Develop FruitDB App
 * AUTHOR: Daniel Cobb
 * CREATED: 11/13/2016
 */

// Setup db variables
$host = 'localhost';
$dbname = 'ssl';
$user = 'root';
$pass = 'root';

// Create dbh as a new instance of PDO
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

?>
