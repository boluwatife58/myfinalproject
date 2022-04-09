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
          <a class="nav-link active forlink" aria-current="page" href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link  forlink" href="registration.php"><i class="fa fa-info" aria-hidden="true"></i>
           Become a seller</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  forlink" href="#"><i class="fa fa-info" aria-hidden="true"></i>
           Orders</a>
        </li>
        <li class="nav-item dropdown  ">
          <a class="nav-link dropdown-toggle  forlink" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
            <i class="fa-solid fa-user"></i>
            Accounts
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id='drop'>
            <li><a class="dropdown-item" href="login.php">Log in</a></li>
            <li><a class="dropdown-item" href="#">Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="signup.php">
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

  
         	
       <!-- header div-->
                <div class='row'>
            <div class='col head1'>
                <p class='text-center'>Gowns</p>
                 </div>
             </div>

            <!-- picture div-->
             <div class='container'>
                    <?php
         include_once('docs/members.php');
          
          $proid=$_GET['id'];  
         // create object of member class
         $obj = new Seller;
         $items= $obj->getProd($proid);

         if (!empty($items)) {?>
<div class="row "> 
            <?php foreach ($items as $key => $value) { ?>
                  <div class="col-sm-12   col-md-3 mt-2 mb-3 ">
        <div class="card" style="width: 16rem; ">
           <?php  $image= $value['seller_image'];
                            echo "<img src='uploads/$image' alt='$image' style='width: !6rem; height:12em; class='img-fluid' ' >"; ?>
          <div class="card-body text-light text-center" style="background-color: black; min-height:7em; font-weight: bold;">
           <?php 
                        $prdname= $value['product_name'];
                        $prdprice= $value['product_price'];
                        $prdid= $value['product_id'];
                    ?>
                <span><?php echo $prdname; ?></span>
                <br/>
                <span><?php echo $prdprice ;?></span>
                <form action='insertsalesproduct.php' method='post'>
                    <input type="hidden" name="price" value='<?php echo $prdprice; ?>'>
                    <input type="hidden" name="productid" value='<?php echo $prdid; ?>'>
                    <input type="hidden" name="userid" value='1'>
                    <input type="hidden" name="trans_action" value='insert'>
                    <button type='submit' name='submit' class='btn btn-primary' id='btbuy' style='width:100%; border-radius: 40px;'>Buy</button>
                </form>
          </div>
        </div>
      </div>
                

         <?php      
           }
       ?></div>
         <?php }

    ?>
                 </div>

         

              
        

 <!--Footer divs-->
          <div class='row'>
            <div class='col-md-3 footer pt-4 ps-5'>
              <h6>MAKE MONEY WITH US</h6>
              <p>Become a seller<br>Learn how you can<br> sell your products<br>And advertise your<br> products with us.</p>
              <p><a href='#'>Register Now</a></p>
            </div>
            <div class='col-md-3 footer pt-4'>
              <h6>ABOUT US</h6>
              <p><a href='#'>Learn about us</a></p>
              <p><a href='#'>Terms and condition</a></p>

            </div>
            <div class='col-md-3 footer pt-4'>
              <h6>HOW WE CAN HELP YOU</h6>
              <p><a href='#'>How to shop with us</a></p>
              <p><a href='#'>Help Center</a></p>
              <p><a href='#'>How to return a product</a></p>
              <p><a href='#'>How to report a product</a></p>
            </div>
            <div class='col-md-3 footer footicons'>
               <a href=''><i class="fa-brands fa-facebook mt-4" style='font-size: 30px;'></i></a><br/>
               <a href=''><i class="fa-brands fa-twitter mt-3" style='font-size: 30px;'></i></a><br/>
                <a href=''><i class="fa-brands fa-instagram mt-3" style='font-size: 30px;'></i></a>


            </div>
          
          </div>
          <div class='row footer2'>
            <div class='offset-3 col-7'>
              <form class='row'>
                <div class='col-8 justify-content-center'>
              <p style='color:#000; font-weight:bold' class='mt-2'>Subscribe to our newsletter to get updates on our latest products.</p>
              <input type='text' placeholder="Enter Email address" name='email' class='form-control'>
               <button class='btn btn-outline-primary subscribe mt-2'>Subscribe</button>
            </div>
               </form>
            </div>
            <div>
              <p class='text-center copyright'>Copyright &copy 2022</p>
            </div>
            </div>

        
       </div> 
       <script type='text/javascript' src='jquery.min.js'></script>
       <script type='text/javascript' src='js/bootstrap.bundle.min.js'></script>
       <script type="text/javascript" language='javascript'>
           
           $(document).ready(function(){
            // function to search
            $('#btbuy').click(function(){
                var order= $(this).val();

                //$('#displayResult').html(searchvalue);

                // use jquery AJAX to send searchvalue to saerch customer.php
                $.ajax({
                    type: "post",
                    url:  "orders.php",
                    data: "searchname=" + order,
                    success: function(msg){
                         $('#displayResult').html(msg);
                    },

                    error: function(errors){
                        console.log(errors);
                        alert("Oops, something happened try again later");
                    }
                });

            }) 
        })
       </script>    
</body>
</html>