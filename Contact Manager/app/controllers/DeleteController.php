<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

namespace delete_control;

use \delete_data as delete_data;

// Add required controllers and models
require_once 'HtmlController.php';
require 'app/models/DeleteData.Class.php';

class DeleteController
{
    private $id;
    private $html;

    /**
     * Sets the id value and instansiates HtmlController
     */
    public function __construct()
    {
        // if url param id is not empty
        if (!empty($_GET['id'])) {
            // userid is equal to $_GET id
            $this->id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
        }
        // Set html to HtmlController
        $this->html = new \html_control\HtmlController;
    }

    /**
     * mainView creates a confirmation page.
     * @return string confirm contact delete
     */
    public function mainView()
    {
        // Call the function deleteConfirm from HtmlController
        $this->html->deleteConfirm($this->id);
    }

    /**
     * deleteContact removes a contact from the database
     * @return null
     */
    public function deleteContact()
    {
        // Instantiate DeleteData.Class
        $deleter = new \delete_data\DeleteData;
        // Remove the contact from db
        $deleter->removeContact($this->id);
    }
}

?>
