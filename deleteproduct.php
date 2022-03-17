<?php

        $proid=$_GET['id'];
    include_once('docs/members.php');
     
     // create object of class
    $obj= new Seller;

    $delete=$obj->deleteProducts($proid);

    var_dump($delete);
?>