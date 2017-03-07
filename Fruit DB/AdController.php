<?php
/*
 * PROJECT: Homework Week 3 Part 2: Develop FruitDB App
 * AUTHOR: Daniel Cobb
 * CREATED: 11/12/2016
 */


function buildAd($ad)
{
    echo '
        <h2>Fruit Of The Day</h2>
        <img src="' . $ad[0]->fruitimage . '">
        <h3>' . $ad[0]->fruitname . '</h3>
        <p>' . $ad[0]->fruitcolor. '</p>
    ';
}
// set up api url
$url = 'http://localhost:8888/School/SSL/week3/Cobb_Daniel_Wk3HW_Pt2/ads.php';
// get the ad from the fruit api
$ad = file_get_contents($url);
// decode the returned json
$data = json_decode($ad);
// send data to build function
echo buildAd($data);

 ?>
