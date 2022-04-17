<?php
       if($_SERVER['REQUEST_METHOD']=='GET'){
      $proid=$_GET['id'];
    include_once('docs/userclass.php');
     
     // create object of class
    $obj= new User;

    $delete=$obj->deleteorder($proid);
    $deletecustord=$obj->deletecustorder($proid);

    header("Location: orders.php");
  }else{
          header("Location: orders.php");
  }
    //var_dump($delete);
?>