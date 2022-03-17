<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/bootstrap.css">
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
          <a class="nav-link active forlink" aria-current="page" href="homepage.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  forlink" href="#">Get Help</a>
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
         
        </li>
      </ul>
    </div>
  </div>
</nav>
     

       		</div>
       	</div>
    
    	    <div class='row mt-4 mb-4 justify-content-center'>
    	    	<div class= ' col-sm-12  col-md-6 '>
    		<form class='row'>
    			<div class='col-12 col-sm-12' id='form'>
                  <label for='Name'></label>				
				 <input type='text' name='name' placeholder='Your Name' id='name' class='form-control'/>
				 </div>
				 
				 <div class='col-12 col-sm-12'>
				 <label for='Email'></label>
				 <input type='email' name='name' placeholder='Enter you email address' class='form-control'/> 
				 </div>
				 
				  <div class='col-12'>
				 <label for='mobile'></label>
				 <input type='phone' name='name' placeholder='Enter your mobile number' id='mobileemail' class='form-control'/> 
				 </div>
				 
				   <div class='col-12'>
				 <label for='newpasswrd'></label>
				 <input type='password' name='name' placeholder='New password' id='newpasswrd' class='form-control'/>
				</div>

				  <div class='col-12'>
				 <label for='address'></label>
				 <input type='text' name='name' placeholder='Enter your Address' id='address' class='form-control'/>

				 <label class='mt-3' for='dob'>Date Of Birth</label>
				 <p class='mt-2 label'>
          <input type='date' name='dob' id='dob' class='form-control'/>
			   </p>
			  
			  <button class='btn btn-outline-info'>Sign Up</button>
				</div>
				 
    		</form>
    	</div>
    </div>
    	
    

           <div class='row'>
            <div class='col-md-4 footer pt-4 ps-5'>
              <h6>MAKE MONEY WITH US</h6>
              <p>Become a seller<br>Learn how you can<br> sell your products<br>And advertise your<br> products with us.</p>
              <p><a href='#'>Register Now</a></p>
            </div>
            <div class='col-md-4 footer pt-4'>
              <h6>ABOUT US</h6>
              <p><a href='#'>Learn about us</a></p>
              <p><a href='#'>Terms and condition</a></p>

            </div>
            <div class='col-md-4 footer pt-4'>
              <h6>HOW WE CAN HELP YOU</h6>
              <p><a href='#'>How to shop with us</a></p>
              <p><a href='#'>Help Center</a></p>
              <p><a href='#'>How to return a product</a></p>
              <p><a href='#'>How to report a product</a></p>

            </div>
          
          </div>
           <div class='row footer2'>
            <div class='offset-3 col-7'>
              <form class='row'>
                <div class='col-8'>
              <p style='color:#000' class='mt-2'>Subscribe to our newsletter to get updates on our latest products.</p>
              <input type='text' placeholder="Enter Email address" name='email' class='form-control'>
               <button class='btn btn-outline-primary subscribe mt-2'>Subscribe</button>
            </div>
            <div class='col'></div>
               </form>
            </div>
            <div>
              <p class='text-center copyright'>Copyright &copy 2022</p>
            </div>
            </div>

	</div>
	<script type='text/javascript' src='js/bootstrap.bundle.min.js'></script>
</body>
</html>