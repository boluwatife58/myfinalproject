<?php
   include_once('docs/userclass.php');
   include_once('docs/members.php');
       
       session_start();
       $userid=$_SESSION['customerid'];
       $productid=$_POST['sellerid'];
         // create object of marketplace class
      $amount=$_POST['total_amount'];
      $ref=$_POST['transref'];
      $email=$_POST['email'];
      $price=$_POST['price'];
      $quantity=$_POST['quantity'];

         $obj = new User;
         $result= $obj->insertTransDetails($amount, $userid,$ref);
         $output= $obj->initializePaystack($amount,$email,$ref);
         //$input=$obj->insertCustOrder($price,$quantity, $productid);
         
          //echo "<pre>";
        // print_r($output);
           // echo "</pre>";

      $redirecturl= $output['data']['authorization_url'];
        
        header("Location: $redirecturl");
        exit;

        