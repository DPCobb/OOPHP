<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

use \update_control as update_control;
use \html_control as html_control;

// required files
require 'app/views/View.Class.php';
require 'app/controllers/UpdateController.php';
require_once 'app/controllers/HtmlController.php';

class UpdateView extends View
{
    public $html;
    /**
     * set the title
     * @param string $title page title
     */
    public function __construct($title)
    {
        parent::__construct($title);
        $this->html = new html_control\HtmlController;
    }

    /**
     * contentBuild builds the main content for the view.
     * @return null
     */
    public function contentBuild()
    {
        $data = new update_control\UpdateController();
        echo $data->mainView();
    }

    /**
     * buildDisplay builds out the view
     * @return null
     */
    public function buildDisplay()
    {
        $all = $this->head() . $this->nav() . $this->html->alertArea() . $this->contentBuild() . $this->footer();
        echo $all;
    }
}

?>
