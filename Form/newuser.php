<!DOCTYPE html>
<!--
Daniel Cobb
SSL Homework Week 1: Develop! Form Processing
10-28-2016
-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New User Form</title>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!-- Start Main Body -->
<main>
    <!-- Start User Information Display -->
    <section>
        <?php
        /*
         * Daniel Cobb
         * SSL Homework Week 1: Develop! Form Processing
         * 10-28-2016
         * Form Processing
         */
        // Check if the form was actually submitted
        if(isset($_POST['submit'])){
            // Check that all fields were submitted
            if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_FILES['img']['name'])){
                function sanitize($value){
                    // This function sanitizes user input
                    // If filtering the string is successful
                    if(filter_var($value, FILTER_SANITIZE_STRING)){
                        // set data to filterd string and return it
                        $data = filter_var($value, FILTER_SANITIZE_STRING);
                        return $data;
                    }
                    // if sanitizing fails, return an error
                    else {
                        echo '
                        <h1> Uh, oh something went wrong</h1>
                        <p>It seems like your form was not submitted, please try again.</p>
                        <a href="index.html" class="button" title="Sign Up">Go Back</a>
                        ';
                    }
                }

                function moveImage($value){
                    // This function moves images to the images folder
                    // set the dir to images
                    $dir = "./images/";
                    // set the upload path
                    $upload = $dir . basename($_FILES['img']['name']);
                    // if the image is successfully uploaded return path
                    if(move_uploaded_file($value, $upload)){
                        return $upload;
                    }
                    // if not return 0
                    else{
                        return 0;
                    }
                }

                function buildResults($f, $l, $u, $p, $i){
                    // this function builds and returns the processed data
                    $results = array("first_name" => $f, "last_name" => $l, "username" => $u, "password" => $p, "image" => $i);
                    return $results;
                }

                function displayResults($value){
                    // this function outputs the formatted display
                    echo '<h1>You entered:</h1>';
                    echo '<table>';
                    // for each value in the associative array
                    foreach($value as $key => $results){
                        // if the key is not image echo out the following:
                        if($key != 'image'){
                            $key = ucwords(str_replace('_', ' ', $key));
                            echo "
                            <tr>
                                <td>$key</td>
                                <td>$results</td>
                            </tr>
                            ";

                        }
                        // if it is an image echo out the following:
                        else {
                            echo '
                            <div class="overlay">
                                <img src=' . $results . ' alt="User Image"/>
                            </div>
                            ';
                        }
                    }
                    // after for each runs close the table and echo out the confirm button
                    echo '</table>';
                    echo '
                    <a href="index.html" class="button" title="Confirm">Confirm Sign Up</a>
                    ';
                }

                // Set needed vars
                // First, Last, User get sent to sanitize
                $firstname = sanitize($_POST['firstName']);
                $lastname = sanitize($_POST['lastName']);
                $username = sanitize($_POST['username']);
                // Salt is a hash of first and last name
                $salt = md5($firstname . $lastname);
                // password is salted and hashed
                $pass = md5($salt . $_POST['password']);
                // set up the image temp name
                $imgTmpName = $_FILES['img']['tmp_name'];
                // empty results array
                $results = array();

                // make sure the image is either a jpg or png
                if(exif_imagetype($imgTmpName) == IMAGETYPE_JPEG || exif_imagetype($imgTmpName) == IMAGETYPE_PNG ){
                    // set imgLoc to the returned value of moveImage
                    $imgLoc = moveImage($imgTmpName);
                    // if imgLoc is not 0
                    if ($imgLoc != '0') {
                        // build results
                        $results = buildResults($firstname, $lastname, $username, $pass, $imgLoc);
                        // display results
                        displayResults($results);
                    }
                    // if imgLoc is 0 display error message
                    else {
                        echo '
                        <h1> Uh, oh something went wrong</h1>
                        <p>It seems like your picture was not uploaded, please try again</p>
                        <a href="index.html" class="button" title="Sign Up">Go Back</a>
                        ';
                        echo $imgLoc;
                        exit;
                    }
                }
                // if the image is not a jpg or png display an error message
                else{
                    echo '
                        <h1> Uh, oh something went wrong</h1>
                        <p>It seems like your picture was not a JPG or PNG, please try again</p>
                        <a href="index.html" class="button" title="Sign Up">Go Back</a>
                        ';
                    exit;
                }


            }
            // If all fields were not submitted display an error message
            else{
                echo '
                <h1> Uh, oh something went wrong</h1>
                <p>It seems like something is missing, please try again.</p>
                <a href="index.html" class="button" title="Sign Up">Go Back</a>
                ';
                exit;
            }

        }
        // If the form was not submitted display an error message
        else{
            echo '
            <h1> Uh, oh something went wrong</h1>
            <p>It seems like your form was not submitted, please try again.</p>
            <a href="index.html" class="button" title="Sign Up">Go Back</a>
            ';
            exit;
        }

        ?>

    </section>
    <!-- End User Information Display -->
</main>
<!-- End Main Body -->
</body>
</html>
