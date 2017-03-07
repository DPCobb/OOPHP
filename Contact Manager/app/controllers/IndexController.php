<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

namespace index_control;

use \read_data as read_data;

// Add required files
require_once 'HtmlController.php';
require 'app/models/ReadData.Class.php';

class IndexController
{
    private $html;

    /**
     * Create a new instance of HtmlController
     */
    public function __construct()
    {
        $this->html = new \html_control\HtmlController;
    }

    /**
     * mainView gets data for all contacts and passes it to the HtmlController
     * @return null
     */
    public function mainView()
    {
        // Fetch all the contacts from the db
        $data = new read_data\ReadData();
        $results = $data->getAllContacts();
        // decode returned results
        $results = json_decode($results);
        // send data to be built into contact cards
        $this->html->contactCards($results);

    }
}

?>
