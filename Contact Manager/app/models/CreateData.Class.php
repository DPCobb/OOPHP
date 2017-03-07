<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

class CreateData
{
    private $firstname;
    private $lastname;
    private $phone;
    private $email;
    private $web;

    /**
     * sanitizes the entered data from the add contact form
     */
    public function __construct()
    {
        // assign and sanitize firstname
        $this->firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
        // assign and sanitize lastname
        $this->lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
        // assign and sanitize phone
        $this->phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        // assign and sanitize email
        $this->email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        // assign and sanitize url
        $this->web = filter_var($_POST['web'], FILTER_SANITIZE_URL);
        // set a pattern for http://
        $webPattern = '/http:\/\//';
        // if the url does not have http://
        if(!preg_match($webPattern, $this->web)) {
            // add http:// to the url
            $this->web = 'http://' . $this->web;
        }
    }

    /**
     * alert sets an alert message to display to user
     * @param  string $msg alert message
     * @return null
     */
    public function alert($msg)
    {
        // set session message to passed msg
        $_SESSION['msg'] = $msg;
        // redirect
        header('Location: index.php');
        // exit
        exit();
    }

    /**
     * insertContact adds a contact to the db
     * @return null
     */
    private function insertContact()
    {
        // require db connection file
        require_once 'dbconn.php';
        // prepare insert statement
        $sth = $dbh->prepare("INSERT INTO contacts (firstname, lastname, phone, email, web) VALUES (:firstname, :lastname, :phone, :email, :web)");
        // bind the parameters
        $sth->bindParam(':firstname', $this->firstname);
        $sth->bindParam(':lastname', $this->lastname);
        $sth->bindParam(':phone', $this->phone);
        $sth->bindParam(':email', $this->email);
        $sth->bindParam(':web', $this->web);
        // if the insert is successful
        if($sth->execute()) {
            // set success message
            $_SESSION['msg'] = 'Contact Added!';
        }
        // if the insert fails
        else {
            // set fail message
            $_SESSION['msg'] = 'Contact could not be added.';
        }


    }

    /**
     * addContact validates form data
     */
    public function addContact()
    {
        // if email is valid
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->email = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        }
        // if email is not valid
        else {
            // set msg
            $result = 'Invalid Email';
            // pass msg to alert
            $this->alert($result);
            // exit
            exit();
        }
        // if the url is valid
        if(!filter_var($this->web, FILTER_VALIDATE_URL) === false) {
            $this->web = filter_var($this->web, FILTER_VALIDATE_URL);
        }
        // if the url is not valid
        else {
            // set msg
            $result = 'Invalid Web address';
            // pass msg to alert method
            $this->alert($result);
            // exit
            exit();
        }
        // regex pattern for phone numbers used from: https://ericholmes.ca/php-phone-number-validation-revisited/
        $pattern = "/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i";
        // if the phone number is not valid
        if(!preg_match($pattern, $this->phone)) {
            // set msg
            $result = 'Invalid Phone Number';
            // pass msg to alert method
            $this->alert($result);
            // exit
            exit();
        }
        // if everything is valid insert the contact
        $this->insertContact();

    }
}

?>
