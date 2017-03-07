<?php

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'CreateData.Class.php';
    if(!empty($_POST['fruitname']) && !empty($_POST['fruitcolor']) && !empty($_POST['fruitimage'])){
        $data = new CreateData();
        $data->createData();
    }
}
?>
<!DOCTYPE html>
<!--
Daniel Cobb
SSL Homework Week 3: Develop! Fruit DB App
11-12-2016
Updated layout with ad space from Week 2
-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>D Cobb Homework Week 3</title>
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
    <div class="row">
        <!-- Start left panel -->
        <div class="four columns">
            <div class="row">
                <div class="twelve columns">
                    <!-- Start Signup Form -->
                    <form method="POST" action="fruitsad.php">
                        <h2>Add a new fruit</h2>
                        <label for="fruitname">Fruit Name</label>
                        <input type="text" id="fruitname" name="fruitname" required />
                        <label for="fruitcolor">Fruit Color</label>
                        <input type="text" id="fruitcolor" name="fruitcolor" required />
                        <label for="fruitcolor">Fruit Image</label>
                        <input type="text" id="fruitimage" name="fruitimage" required />
                        <input type="submit" value="Add Fruit" class="button-primary" />
                    </form>
                    <!-- End Signup Form -->
                </div>
            </div>
            <div class="row">
                <div class="twelve columns">
                    <div id="ad">
                        <!-- Display Ad -->
                        <?php
                            require 'AdController.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End left panel -->
        <!-- Start right panel -->
        <div class="eight columns">
            <section id="viewDB">
                <?php
                    require 'ReadController.php';
                    $data = new ReadControl();
                    $data->dashboard();

                ?>
            </section>
        </div>
        <!-- End right panel -->
    </div>
</main>
<!-- End Main Body -->
</body>
</html>
