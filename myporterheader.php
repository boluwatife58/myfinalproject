<?php
 session_start();

 // check if user authenticate
 if(isset($_SESSION['mylogchecker']) && $_SESSION['mylogchecker']=='Rt_0_0_cMeg'){

 }else{
  header("Location: sellerlogin.php");
  exit;
 }
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register as a seller</title>
	<link rel="stylesheet" href="css/bootstrap.css">
  <!-- animate css-->
    <link rel="stylesheet" type="text/css" href="animate/animate.css">
	<style type='text/css'>
		body{
    background-color: #F9F9F9 ;
  }
 div{
       box-sizing: border-box;
     /* border: 1px solid blue;  */
       min-height: 50px;
	 }
	 #nav{
	 
	 	background-color: #fff;
	 }
	  .forlink {
	     color: #000;
	  } 
	  
	  #drop li a:hover{
	     background-color: blue;
	     color: #fff; 
	  }

	   .footer a {
      color: #A4A4A9;
      text-decoration: none;

    }
    .footer{
      background-color: #323232;
      height: 400px;
    }
    .footer a:hover{
      text-decoration: underline;
    }
    .footer p{
      color: #A4A4A9;
    }
    .footer h6{
      color: #fff;
    }
    
    .subscribe{
      color: #fff;
    }

    .footer2{
      background-color: #fff;
    }

    .copyright{
      color: #fff;
    }


	</style>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<div class='col'></div>
		</div>
		<div class='row sticky-top' id='nav'>
       		<div class='col'>
       			  
               <nav class="navbar navbar-expand-lg navbarr">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex">
        <input class="form-control me-2 text-center" type="search" placeholder="Search Products" aria-label="Search">
        <button class="btn btn-primary " type="submit">Search</button>
      </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style='justify-content:flex-end'>
      <ul class="navbar-nav mb-2 mb-lg-0" id='links'>
        <li class="nav-item">
          <a class="nav-link active forlink" aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  forlink" href="#">Get Help</a>
        </li>
         <li class="nav-item">
          <a class="nav-link  forlink" href="listproducts.php">Products</a>
        </li>
        <li class="nav-item dropdown  ">
          <a class="nav-link dropdown-toggle  forlink" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Accounts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style='background-color:' id='drop'>
            <li><a class="dropdown-item" href="#">Log in</a></li>
            <li><a class="dropdown-item" href="#">Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">
            	<button class='btn btn-primary' style="width:100%">Sign Up</button>
            </a></li>
          </ul>
		 
        </li>
        <li class="nav-item">
          <a class="nav-link  forlink" href="sellerlogout.php">Log Out</a>
        </li>
        <li class="nav-item">
         
        </li>
      </ul>
    </div>
  </div>
</nav>
     

       		</div>
       	</div>
