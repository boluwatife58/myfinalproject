<?php


   session_start();

   session_destroy();

   header("Location: sellerlogin.php");
   exit;
   
?>