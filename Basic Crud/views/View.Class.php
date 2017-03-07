<?php
/*
 * PROJECT: PDO/CRUD Activity
 * AUTHOR: Daniel Cobb
 * CREATED: 11/4/2016
 */

class View
{
    public $title;

    function __construct($title)
    {
        $this->title = $title;
    }


    //create the header
    public function createHeader()
    {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>'.$this->title.'</title>
            <link href="./public/css/normalize.css" rel="stylesheet" type="text/css"/>
            <link href="./public/css/skeleton.css" rel="stylesheet" type="text/css"/>
            <link href="./public/css/main.css" rel="stylesheet" type="text/css"/>
        </head>
        <body>
        <main>
        <h1>User Dashboard</h1>
        ';
    }

    // create the footer
     public function createFooter()
     {
         echo'
         </main>
         </body>
         </html>
         ';
     }

     // build the view
     public function buildDisplay()
     {
         $all = $this->createHeader() . $this->createFooter();
         echo $all;
     }
}

?>