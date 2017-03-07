<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

// Setup db variables
$host = 'localhost';
$dbname = 'users_101';
$user = 'root';
$pass = 'root';

// Create dbh as a new instance of PDO
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

?>