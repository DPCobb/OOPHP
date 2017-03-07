<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

require './models/ReadData.Class.php';
class ReadController
{
    public $data;

    function __construct()
    {
        $this->data = new ReadData();
    }
    // talks to the model and structures the html to return to the view
    function buildDashboard($data)
    {
        // if data is not 0, build the html
        if($data != 0)
        {
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
            // for each item in data as row build table row
            foreach($data as $row) {
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
        // if data is 0 return not a valid id
        else
        {
            echo '</tbody></table>';
            echo '<h2>Not a valid User ID</h2>';
        }

    }

    // decides which function to call in ReadData.Class
    function dashboard()
    {
        // if url param id is set
        if (isset($_GET['id'])) {
            // set user id
            $userId = $_GET['id'];
            // get user specific data
            $results = $this->data->getData($userId);
            // if results are empty, user does not exist, set results to 0
            if(empty($results)){
                $results = 0;
            }

        }
        // if not get all data
        else
        {
            $results = $this->data->getAllData();
        }
        // build the dashboard
        $this->buildDashboard($results);
    }

}
?>
