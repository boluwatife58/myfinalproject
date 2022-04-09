<?php
       if($_SERVER['REQUEST_METHOD']=='GET'){
      $proid=$_GET['id'];
    include_once('docs/members.php');
     
     // create object of class
    $obj= new Seller;

    $delete=$obj->deleteProducts($proid);

    header("Location: listproducts.php");
  }else{
          header("Location: listproducts.php");
  }
    //var_dump($delete);
?>