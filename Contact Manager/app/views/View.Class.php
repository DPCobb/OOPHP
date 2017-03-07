<?php
/**
 * Daniel Cobb
 * SSL Week 4 HW pt 2
 * 11/17/2016
 */

 abstract class View
 {
     public $title;

     /**
      * sets the page title
      * @param string $title sets the page title
      */
     public function __construct($title)
     {
         $this->title = $title;
     }


     /**
      * head builds the html header
      * @return null
      */
     public function head()
     {
         echo '
         <!DOCTYPE html>
         <!--
             Daniel Cobb
             Week 4 HW PT 1
             11/16/2016
         -->

         <html>
         <head>
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>' . $this->title . '</title>
             <link href="public/css/normalize.css" rel="stylesheet" type="text/css"/>
             <link href="public/css/skeleton.css" rel="stylesheet" type="text/css"/>
             <link href="public/css/main.css" rel="stylesheet" type="text/css"/>
             <script src="https://use.fontawesome.com/1c938c3028.js"></script>
             <script src = "public/libs/jquery-3.1.1.min.js"></script>
         </head>
         <body>
         ';
     }

     /**
      * nav builds the navigation
      * @return null
      */
     public function nav()
     {
         echo '
         <!-- Start Header -->
         <header>
             <nav>
                 <h1>ContactManage</h1>
                 <ul>
                     <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                 </ul>
             </nav>
         </header>
         <!-- End Header -->
         <!-- Start Main Body Section -->
         <main>
         ';
     }

     /**
      * footer builds the html for the footer
      * @return null
      */
      public function footer()
      {
          echo'
          </main>
          <!-- End Main Body -->
          <!-- JS file -->
          <script src="public/js/main.js"></script>
          </body>
          </html>
          ';
      }

      /**
       * buildDisplay builds out the view
       * @return null
       */
      public function buildDisplay()
      {
          // combine head, nav, footer for display
          $all = $this->head() . $this->nav() . $this->footer();
          // echo html
          echo $all;
      }
 }


 ?>
