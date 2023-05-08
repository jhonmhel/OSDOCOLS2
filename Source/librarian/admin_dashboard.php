<?php 
     session_start();
    if (!isset($_SESSION["user_id"])) {
        ?>
            <script type="text/javascript">
                window.location="login.php";
            </script>
        <?php
    }
    // $page = 'home';
    include 'includes/header.php';
    include 'includes/connection.php';
 ?>
  <section class="content">
        
     
  </section>


