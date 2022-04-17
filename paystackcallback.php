<?php
include_once('myporterheader1.php');
        //session_start();
        $userid=$_SESSION['customerid'];
        $ref=$_GET['reference'];
        $custid=$_SESSION['custid'];
    include_once('docs/userclass.php');
     
     // create object of class
    $obj= new User;
    $outcome=$obj->updateCustorder($ref,$custid);
    $delete=$obj->emptycart($userid);
    if($delete==true){
        header("Location: homepage2.php");
    }else{
        header("Location: orders.php");
      }
?> 


<?php
  include_once('myporterfooter.php');
?>