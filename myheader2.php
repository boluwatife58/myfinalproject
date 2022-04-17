  <?php
 session_start();

 // check if user authenticate
 if(isset($_SESSION['mylogchecker']) && $_SESSION['mylogchecker']=='Rt_0_0_cMeg'){

 }else{
  header("Location: customerlogin.php");
  exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="externalcss/homepage.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<link rel="stylesheet" href="animate/animate.css" type='text/css'>
	<title>Homepage</title>
	<style type="text/css" >

	 #header{
    background-image:url(backgroundimage/carouselimage2.jpg);
    height:500px;
    background-size:cover;
    color:#fff;
    background-blend-mode:overlay;
    }
  
    #headersub{
      padding-top: 100px;
    }

    .probutton a{
  color: #fff;
  text-decoration: none;
}

	</style>
</head>
<body>
      <div class='container'>
       	<div class='row'>
       		<div class='col icons'>
         <a href=''><i class="fa-brands fa-facebook mx-2"></i></a>
         <a href=''><i class="fa-brands fa-twitter mx-2"></i></a>
         <a href=''><i class="fa-brands fa-instagram ms-2"></i></a>

          </div>
       	</div>
       	<div class='row sticky-top' id='nav'>
       		<div class='col'>
       			  
          <nav class="navbar navbar-expand-md ">
  <div class="container col-md-12">
    <p class="navbar-brand mt-2" style='color:blue;font-weight: bold;'>naijaShop</p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="d-flex justify-content-center">
        <input class="form-control me-2 text-center" type="search" placeholder="Search Products" aria-label="Search" style='border:1px solid blue; color:blue;'>
        <button class="btn btn-primary " type="submit" style='border-radius: 30px;'>Search</button>
      </form>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style='justify-content:flex-end'>
      <ul class="navbar-nav mb-2 mb-lg-0" id='links'>
       <!--  <li class="nav-item">
          <a class="nav-link active forlink" aria-current="page" href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
        </li> -->
         <li class="nav-item">
          <a class="nav-link  forlink" href="registration.php"><i class="fa fa-info" aria-hidden="true"></i>
           Become a seller</a>
        </li>
        
         <li class="nav-item">
          <a class="nav-link  forlink" href="orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
           Orders<span class='badge badge-primary' ></span></a>
        </li>

        <li class="nav-item dropdown  ">
          <a class="nav-link dropdown-toggle  forlink" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
            <i class="fa-solid fa-user"></i>
            Accounts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id='drop'>
            <li><a class="dropdown-item" href="customerlogin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>  Log in</a></li>
              
              <li>
               <a class="dropdown-item  forlink" href="userlogout.php">Log Out</a>
             </li>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="customregistration.php">
            	<button class='btn btn-primary' style="width:100%"><i class="fa fa-sign-in" aria-hidden="true"></i>  Sign In</button>
            </a></li>
          </ul>
		 
        </li>
        <li class="nav-item">
         
        </li>
      </ul>
    </div>
  </div>
</nav>

       		</div>
       	</div>
