<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

namespace update_control;

use \read_data as read_data;

// required files
require_once 'HtmlController.php';
require 'app/models/ReadData.Class.php';
require_once 'app/models/UpdateData.Class.php';

class UpdateController
{
    private $html;

    /**
     * Set a new instance of HtmlController
     */
    public function __construct()
    {
        $this->html = new \html_control\HtmlController;
    }

    /**
     * mainView returns data for a specific user and passes it to the update form
     * @return null
     */
    public function mainView()
    {
        if(isset($_GET['id'])){
            // set an instance of ReadData
            $data = new read_data\ReadData();
            // sanitize and set id
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            // get user contact information
            $results = $data->getContact($id);
            //decode the returned json
            $results = json_decode($results);
            // pass to the update form for display
            $this->html->updateForm($results);
        }
        else {
            $_SESSION['msg'] = 'Missing Id';
            header('Location: index.php');
        }

    }

    /**
     * updateContact starts the user update functions by calling a validation method
     * @return null
     */
    public function updateContact()
    {
        if(isset($_POST) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['web'])) {
            // create an instance of UpdateData
            $updater = new \update_data\UpdateData;
            // call updateContact
            $updater->updateContact();
        }
        else {
            $_SESSION['msg'] = 'Missing required fields';
            header('Location: index.php');
        }
    }
}
?>
