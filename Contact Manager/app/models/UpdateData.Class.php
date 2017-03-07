<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

namespace update_data;

class UpdateData
{
    // declare vars
    private $firstname;
    private $lastname;
    private $phone;
    private $email;
    private $web;
    private $id;

    /**
     * Sanitizes update form data
     */
    public function __construct()
    {
        // sanitize and assign firstname
        $this->firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        // sanitize and assign lastname
        $this->lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        // sanitize and assign phone
        $this->phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        // sanitize and assign email
        $this->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        //sanitize and assign web
        $this->web = filter_var($_POST['web'], FILTER_SANITIZE_URL);
        // sanitize and assign id
        $this->id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        // web pattern to look for http://,  needed for url validation
        $webPattern = '/http:\/\//';
        // if url does not have http://
        if(!preg_match($webPattern, $this->web)) {
            // add http:// to the front of submitted url
            $this->web = 'http://' . $this->web;
        }
    }

    /**
     * alert is used to set the session msg var for the user alerts
     * @param  string $msg message to display in alert area
     * @return null
     */
    public function alert($msg)
    {
        // set session msg to passed msg
        $_SESSION['msg'] = $msg;
        // redirect to index
        header('Location: index.php');
        // exit just to be sure nothing else runs
        exit();
    }

    private function executeUpdateContact()
    {
        // require the db connection file
        require_once 'dbconn.php';
        // prepare the update statement
        $sth = $dbh->prepare("UPDATE contacts SET firstname = :firstname, lastname = :lastname, phone = :phone, email = :email, web = :web WHERE id = :id");
        // bind the parameters
        $sth->bindParam(':firstname', $this->firstname);
        $sth->bindParam(':lastname', $this->lastname);
        $sth->bindParam(':phone', $this->phone);
        $sth->bindParam(':email', $this->email);
        $sth->bindParam(':web', $this->web);
        $sth->bindParam(':id', $this->id);
        // if execute succeeds
        if($sth->execute()) {
            // set success message
            $_SESSION['msg'] = 'Contact Updated!';
            // redirect
            header('Location: index.php');
        }
        // if update fails
        else {
            // set error message
            $_SESSION['msg'] = 'Contact could not be updated.';
        }


    }

    /**
     * updateContact is used for data validation
     * @return null
     */
    public function updateContact()
    {
        // if email is valid
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->email = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        }
        // if email is invalid
        else {
            // set message
            $result = 'Invalid Email';
            // pass message to alert method
            $this->alert($result);
            // exit
            exit();
        }
        // if url is valid
        if(!filter_var($this->web, FILTER_VALIDATE_URL) === false) {
            $this->web = filter_var($this->web, FILTER_VALIDATE_URL);
        }
        // if url is invalid
        else {
            // set message
            $result = 'Invalid Web address';
            // pass message to alert method
            $this->alert($result);
            // exit
            exit();
        }
        // regex pattern for phone numbers used from: https://ericholmes.ca/php-phone-number-validation-revisited/
        $pattern = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
        // if the phone number is not valid
        if(!preg_match($pattern, $this->phone)) {
            // set message
            $result = 'Invalid Phone Number';
            // pass message to alert method
            $this->alert($result);
            //exit
            exit();
        }
        // if everything passes as valid execute the update
        $this->executeUpdateContact();

    }
}

?>
