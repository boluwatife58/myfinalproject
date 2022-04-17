<?php
   
    session_start();
    // $userid=$_SESSION['customerid'];
 //check if user authenticate
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
  <div class="container-fluid">
    <p class="navbar-brand mt-2" style='color:blue;font-weight: bold;'>naijaShop</p>
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
          <a class="nav-link active forlink" aria-current="page" href="homepage2.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
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
          
          <li>
          <a class="dropdown-item  forlink" href="userlogout.php">Log Out</a>
            </li>
            <li>
            <a class="dropdown-item  forlink" href="editprofile.php?id=<?php echo $userid; ?>">Edit Profile</a>
            </li>
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
                <p class='text-center'>All Products</p>
                 </div>
             </div>

            <!-- picture div-->
             <div class='container'>
                    <?php
         include_once('docs/userclass.php');
         include_once('docs/members.php');
          
         // $_SESSION['orderid'] = $row['order_id'];
         if(isset($_SESSION['customerid'])){
          $userid=$_SESSION['customerid'];
         }
         $orders= new User;
         if ($_SERVER['REQUEST_METHOD']=='POST') {
          if(!empty($_POST['quantity'])){
           $cart=$orders->insertCart($_POST['productid'], $_POST['sellerid'],$_POST['custid'], $_POST['quantity']);
            $custord=$orders->insertCustOrder($_POST['productid'], $_POST['sellerid'],$_POST['custid'], $_POST['quantity']);
            $delivery=$orders->insertDelivery($_POST['productid'], $_POST['orderid']);
           if($cart==true){
             $result="Successfully added to cart";
             echo $result;
           }
         }else{
             $output="No quantity selected";
             echo $output;
          }
         }


             $catid=$_GET['id'];
         // create object of marketplace class

         $obj = new Seller;
         $items= $obj->findcat($catid);
          //var_dump($items);
          // exit;
         if (!empty($items)) {?>
<div class="row "> 
            <?php foreach ($items as $key => $value) {  $id = $value['product_id'];  ?>

                  <div class="col-sm-12   col-md-3 mt-2 mb-3 " id="items-<?php echo $value['product_id'];?>" >
        <div class="card" style="width: 16rem; ">
           <?php  $image= $value['seller_image'];
                            echo "<img src='uploads/$image' alt='$image' style='width: !6rem; height:14em; class='img-fluid' ' >"; ?>
          <div class="card-body text-light text-center" style="background-color: #fff; min-height:7em; font-weight: bold;">
           <?php 
                        $prdname= $value['product_name'];
                        $prdprice= $value['product_price'];
                        $prdid= $value['product_id'];
                        $sellerid=$value['seller_id'];
                        $orderid=$_SESSION['orderid']
                    ?>
                <span style='color:#000;'><?php echo $prdname; ?></span>
                <br/>
                <span style='color:#000;'><?php echo $prdprice ;?></span>
                     
                    
                     <form action='' method='post'>
                       <input type="hidden" name="price" value='<?php echo $prdprice; ?>'>
                       <button type='button' onclick="decrement(this)" class='btn btn-primary mb-2'>-</button>
                       <input type="number" name="quantity" id='order' min=0 style="width:80px;">
                      <button type='button' onclick="increment(this)" class='btn btn-primary mb-2'>+</button>
                     <input type="hidden" name="custid" value='<?php echo $userid; ?>'>
                      <input type="hidden" name="productid" value='<?php echo $prdid; ?>'>
                       <input type="hidden" name="price" value='<?php echo $prdprice; ?>'>
                       <input type='hidden' name='sellerid' value='<?php echo $sellerid; ?>'>
                       <input type='hidden' name='orderid' value='<?php echo $orderid; ?>'>
                    <button type='submit' name='submit' class='btn btn-primary btnAddToCart' id='btbuy' style=' border-radius: 40px;' ><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add To Cart</button>
                    <button type='submit' name='submit' class='btn btn-primary mt-3' id='btbuy' style=' border-radius: 40px;'><a href='alldetails.php?id=<?php echo $id; ?>' style='color:#fff;text-decoration: none;'>View More</a></button>

                    </form>
                

        
          </div>
        </div>
      </div>
           
          <!--  <div class='col'>
                 <?php  $proddesc= $value['product_description']; ?>
                 <p style='font-weight:bold;'>Product Description:</p><span><?php  echo $proddesc; ?></span>
           </div>  -->   



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
         
             function increment(element){
                 element.previousElementSibling.stepUp();
             }function decrement(element){
                 element.nextElementSibling.stepDown();
             }
           //          $(document).ready(function(){
           //     $('#btnorder').click(function(){

           //      var orderdetails=$('').serialize();
           //      var orderdetails=$('').serialize('');

           //      $.ajax({
           //        url:"orders.php",
           //        type:"POST";
           //        data:orderdetails,
           //        success:function(rsp){
           //          $('#result').html(rsp);
           //        }
           //      });
           //     });
            
           // });
       </script>    
</body>
</html>