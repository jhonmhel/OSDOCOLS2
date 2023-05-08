<?php 
	// session_start();
	// unset($_SESSION["user_id"]);

 ?>
 <!-- <script type="text/javascript">
 	window.location="../../login.php";
 </script> -->
 
 <?php 
  session_start();

  if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
  }

  header("Location:login.php");
  exit;
?>
