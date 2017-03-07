<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

namespace html_control;
/**
 * HtmlController holds large sections of HTML or sections that require data
 * from the db. This is mainly to keep the other controllers clean, organized,
 * and clutter free.
 */
class HtmlController
{
    /**
     * alertArea builds the user alert box display
     * @return null
     */
    public function alertArea()
    {
        // if session message is set and not empty
        if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])) {
            echo '
            <div class="row">
                <div class="twelve columns">
                    <!-- Alert Display area -->
                    <section class="alerts">
                        <h2>' . $_SESSION['msg'] . '</h2>
                    </section>
                    <!-- End Alert Area -->
                </div>
            </div>
            ';
        }
    }

    /**
     * toolbar creates the add contact button
     * @return null
     */
    public function toolbar()
    {
        echo '
        <div class="row">
            <div class="twelve columns">
                <!-- Create User Button placed on bottom right of screen -->
                <div class="toolbar">
                    <span id="createUser"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                </div>
                <!-- End Create User Button -->
            </div>
        </div>
        ';
    }

    /**
     * contactCards builds the contact cards on the main page
     * @param  array $data array of contact information
     * @return null
     */
    public function contactCards($data)
    {
        echo '
        <!-- Start Contact Display Cards -->
        <div class="row contacts">
            <div class="twelve columns">';
        // set counter
        $i = 0;
        // while i is less than the total returned records
        while($i < count($data)){
            // echo out a contact card
            echo '<div class="usercard">
                    <h3>' . $data[$i]->firstname . ' ' . $data[$i]->lastname .'</h3>
                    <h4>' . $data[$i]->email . '</h4>
                    <h4>' . $data[$i]->phone . '</h4>
                    <h4><a href="' . $data[$i]->web . '" target="_blank">' . $data[$i]->web . '</a></h4>
                    <div class="actions">
                        <span class="deleteUser"><a href="index.php?p=delete&id=' . $data[$i]->id .'"><i class="fa fa-trash" aria-hidden="true"></i></a></span>
                        <span class="updateUser"><a href="index.php?p=update&id=' . $data[$i]->id .'"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                    </div>
                </div>';
                // i + 1
                $i++;
            }
            echo '
            </div>
        </div>
        <!-- End Contact Display -->';
    }

    /**
     * contactForm builds the add contact form
     * @return null
     */
    public function contactForm()
    {
        echo '
        <div class="modal">
            <div class="modalform">
                <span class="closeModal"><i class="fa fa-times" aria-hidden="true"></i></span>
                <form action="index.php?action=create" method="post">
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="John" required/>

                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Smith" required/>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="email@mail.com"required/>

                    <label for="phone">10 Digit Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="123-123-4567" required/>

                    <label for="web">Web</label>
                    <input type="text" id="web" name="web" placeholder="http://www.example.com" required/>

                    <input type="submit" value="Add User"/>
                </form>

            </div>
        </div>
        <!-- End New user modal -->
        ';
    }

    /**
     * updateForm builds the form to update contact info
     * @param  array $data array holding the data for a specific contact
     * @return null
     */
    public function updateForm($data)
    {
        // echo out the update form setting the value to the matching data
        echo'
        <div class="modalform">
            <form action="index.php?p=update&action=update&id=' . $data[0]->id . '" method="post">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" value="' . $data[0]->firstname . '" required/>

                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" value="' . $data[0]->lastname . '" required/>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="' . $data[0]->email . '"required/>

                <label for="phone">10 Digit Phone Number</label>
                <input type="text" id="phone" name="phone" value="' . $data[0]->phone . '" required/>

                <label for="web">Web</label>
                <input type="text" id="web" name="web" value="' . $data[0]->web . '" required/>

                <input type="submit" value="Update User"/>
            </form>

        </div>
        ';
    }

    /**
     * deleteConfirm builds the confirm delete page
     * @param  integer $id the contact id that is going to be deleted
     * @return null
     */
    public function deleteConfirm($id)
    {
        // echo out confirmation form
        echo '
        <div class="modalform">
            <form action="index.php?p=delete&action=delete&id=' . $id . '" method="post" class="centered">
                <h2>Are you sure you want to delete this contact?</h2>
                <input type="submit" value="Confirm Delete"/>
                <a href="index.php" class="button">Cancel</a>
            </form>
        </div>
        ';
    }
}

?>
