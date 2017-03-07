<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

namespace read_data;

class ReadData
{

    /**
     * getContact retrieves the contact data for a specific contact.
     * @param integer $id
     * @return array array of contact information
     */
    public function getContact($id)
    {
        include 'dbconn.php';
        // prepare select by id statement
        $sth = $dbh->prepare("SELECT * FROM contacts WHERE id = :id");
        // bind id param
        $sth->bindParam(':id', $id);
        //execute select
        $sth->execute();
        // fetch result
        $result = $sth->fetchAll();
        // encode result
        $result = json_encode($result);
        // return results
        return $result;
    }

    /**
     * getAllContacts returns all contact info from db.
     * @return array array of results
     */
    public function getAllContacts()
    {
        include 'dbconn.php';
        // prepare select
        $sth = $dbh->prepare("SELECT * FROM contacts");
        //execute
        $sth->execute();
        // fetch results
        $result = $sth->fetchAll();
        // encode results
        $result = json_encode($result);
        // return results
        return $result;
    }
}

?>
