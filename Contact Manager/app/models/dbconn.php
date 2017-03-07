<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

// Setup db variables
$host = 'localhost';
$dbname = 'ssl';
$user = 'root';
$pass = 'root';

// Create dbh as a new instance of PDO
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

?>
