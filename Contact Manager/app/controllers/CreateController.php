<?php
/**
 * Daniel Cobb
 * Contact Manager Project
 * 11/2016
 */

namespace create_control;

// required file
require_once 'app/models/CreateData.Class.php';

class CreateControl
{
    /**
     * createContact creates a new contact
     * @return null
     */
    public function createContact()
    {
        $add = new \CreateData;
        $add->addContact();
    }

}

?>
