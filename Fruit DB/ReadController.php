<?php
/*
 * PROJECT: Homework Week 3: Develop FruitDB App
 * AUTHOR: Daniel Cobb
 * CREATED: 11/13/2016
 */

// require ReadData.Class which interacts with the db
require 'ReadData.Class.php';

class ReadControl
{
    // Make var data private
    private $data;
    function __construct()
    {
        // set data to new instance of ReadData from ReadData.Class
        $this->data = new ReadData();
    }

    // Parse record set
    function buildDisplay($data)
    {
        // if data is not 0
        if($data != 0) {
            echo '
            <table>
                <thead>
                    <tr>
                        <th>Fruit Name</th>
                        <th>Fruit Color</th>
                        <th>Fruit Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
            ';
            $i = 0;
            while($i < count($data)) {
                echo '
                <tr>
                    <td> ' . $data[$i]->fruitname . '</td>
                    <td> ' . $data[$i]->fruitcolor . '</td>
                    <td> ' . $data[$i]->fruitimage . '</td>
                    <td><a class ="button" href="index.php?p=update&id=' . $data[$i]->id . '">Update</a></td>
                    <td><a class ="button" href="deletefruit.php?id=' . $data[$i]->id . '">Delete</a></td>
                </tr>
            ';
            $i++;
            }
            echo '
                </tbody>
            </table>
            ';
        }
        else {
            echo '
                </tbody>
            </table>
            ';
        }
    }

    // decide which method to call in ReadData.Class
    function dashboard()
    {
        // if id is passed
        if (isset($_GET['id'])) {
            // set fruitid to id
            $fruitid = $_GET['id'];
            // pass id to getData method
            $results = $this->data->getData($fruitid);
            $results = json_decode($results);
            // if results return empty, id is not valid
            if(empty($results)){
                // make results = 0
                $results = 0;
            }

        } else {
            // results are equal to getAllData
            $results = $this->data->getAllData();
            $results = json_decode($results);
        }
        // parse the results
        $this->buildDisplay($results);
    }
}

?>
