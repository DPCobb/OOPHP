<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */
namespace delete_data;

class DeleteData
{
    /**
     * removeContact removes a contact from the db
     * @param  integer $id contact id to be deleted
     * @return null
     */
    public function removeContact($id)
    {
        // include the db connection file
        include 'dbconn.php';
        // prepare delete statement
        $sth = $dbh->prepare("DELETE FROM contacts WHERE id = :id");
        // bind id param
        $sth->bindParam(':id', $id);
        // if delete is successful
        if ($sth->execute()) {
            // set session msg for alert
            $_SESSION['msg'] = 'Contact Deleted!';
            // redirect to index.php
            header('Location: index.php');
        }
        else {
            // if delete fails set error message
            $_SESSION['msg'] = 'Contact could not be deleted.';
        }
    }
}

?>
