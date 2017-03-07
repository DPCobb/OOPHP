<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

require './models/ReadData.Class.php';
class IndexController
{
    // retrieves and structures returned data
    function dashboard(){
        // instantiate new ReadData
        $data = new ReadData();
        // set the results to all data
        $results = $data->getAllData();
        // structure the html
        echo'
        <table>
        <thead>
        <tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>';
        // for each item in results as row structure table data
        foreach($results as $row) {
            echo '
            <tr>
                <td>' . $row['userid'] . '</td>
                <td>' . $row['username'] . '</td>
                <td>' . $row['password'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['photo'] . '</td>
                <td><a class="button" href="index.php?p=update&id=' . $row['userid'] . '">Update</a></td>
                <td><a class="button" href="index.php?p=delete&id=' . $row['userid'] . '">Delete</a></td>
            </tr>
            ';
        }
        echo '</tbody></table>';
    }

}
?>
