<!DOCTYPE html>
<!--
Daniel Cobb
SSL Homework Week 3: Develop! Fruit DB App
11-13-2016
-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D Cobb Homework Week 2</title>
    <link href="public/css/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/skeleton.css" rel="stylesheet" type="text/css"/>
    <link href="public/css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<nav>
    <h1>FruitDB</h1>
</nav>
<!-- Start Main Body -->
<main>

    <?php
    /*
     * PROJECT: Homework Week 3: Develop FruitDB App
     * AUTHOR: Daniel Cobb
     * CREATED: 11/13/2016
     */

        require 'DeleteController.php';

        $data = new DeleteController();
        echo $data->deleteUser();

    ?>

</main>
<!-- End Main Body -->
</body>
</html>
