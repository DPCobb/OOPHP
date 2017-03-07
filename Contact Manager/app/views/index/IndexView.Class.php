<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

use \index_control as index_control;
use \html_control as html_control;

// required files
require 'app/views/View.Class.php';
require 'app/controllers/IndexController.php';
require_once 'app/controllers/HtmlController.php';

class IndexView extends View
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
        $data = new index_control\IndexController();
        echo $data->mainView();
    }

    /**
     * buildDisplay builds out the view
     * @return null
     */
    public function buildDisplay()
    {
        $all = $this->head() . $this->nav() . $this->html->alertArea() . $this->html->toolbar() . $this->contentBuild() . $this->html->contactForm() . $this->footer();
        echo $all;
    }
}

?>
