 <?php
      include_once('myheader.php');

      // include your class
         include_once('docs/members.php');

        //create user object
         $obj= new Seller;

      ?>


             <div class='row justify-content-center'>
               <div class='col-md-6'>
            
          



          </div>
             </div>
    	    <div class='row mt-4 mb-4 justify-content-center'>

    	    	<div class= ' col-sm-12  col-md-6 '>


                 <label>Existing user?  <a href='sellerlogin.php' style='text-decoration: none;'> Login here</label></a>

              <?php
         if($_SERVER['REQUEST_METHOD']=='POST'){

           // validate
           $errors= array();
           if(empty($_POST['seller_name'])){
              $errors['errseller_name'] = "Name cannot be empty";
           }

           if(empty($_POST['seller_email'])){
             $errors['errseller_email']= "Email field cannot be empty";
           }
           
           if(empty($_POST['seller_phone'])){
             $errors['errseller_phone']= "Phone Number field cannot be empty";
           }

           if(empty($_POST['seller_password'])){
             $errors['errseller_password']= "Password field cannot be empty";
           }
            
             $errmsg=$obj->checkEmail($_POST['seller_email']);
           if($errmsg==true){
             echo "<div class='alert alert-danger'>";
             echo "Email not accepted";
             echo "<div>";
           }else{

         if(empty($errors)){
               
            
          // access login method
          $output = $obj->registerSeller($_POST['seller_name'], $_POST['seller_email'], $_POST['seller_phone'], $_POST['seller_password']);

                if($output == true){
                      
                       $message = "1";
                      header("Location: mysuccesspage.php?msg=$message");
                      exit;
                    }else{
                      echo "<div class='alert alert-danger'>Oops, could not register your details.</div>";
                    }
                }

        }
      }
       ?>

    		<form class='row' id='user1'  method='post' action=''>
    			<div class='col-12 col-sm-12' id='form'>
                  <label for='Name'></label>				
				 <input type='text' name='seller_name' placeholder='Your Name' id='name' class='form-control' value='<?php if(isset($_POST['seller_name'])){ echo $_POST['seller_name']; } ?>'/>
             <?php
               if(isset($errors['errseller_name'])){
                echo "<p class='text-danger'>".$errors['errseller_name']."</p>";
               }
             ?>
				 </div>
				 
				 <div class='col-12 col-sm-12'>
				 <label for='Email'></label>
				 <input type='email' name='seller_email' placeholder='Enter you email address' class='form-control' id='email' value='<?php if(isset($_POST['seller_email'])){ echo $_POST['seller_email']; } ?>'/> 

         <?php
               if(isset($errors['errseller_email'])){
                echo "<p class='text-danger'>".$errors['errseller_email']."</p>";
               }
             ?>
				 </div>
				 
				  <div class='col-12'>
				 <label for='mobile'></label>
				 <input type='phone' name='seller_phone' placeholder='Enter your mobile number' id='mobile' class='form-control' value='<?php if(isset($_POST['seller_phone'])){ echo $_POST['seller_phone']; } ?>'/>
         <?php
               if(isset($errors['errseller_phone'])){
                echo "<p class='text-danger'>".$errors['errseller_phone']."</p>";
               }
             ?> 
				 </div>
           <div class='col-12'>
				 <label for='newpasswrd'></label>
				 <input type='password' name='seller_password' placeholder='Enter your password' id='newpasswrd' class='form-control' value='<?php if(isset($_POST['seller_password'])){ echo $_POST['seller_password']; } ?>'/>
         <?php
               if(isset($errors['errseller_password'])){
                echo "<p class='text-danger'>".$errors['errseller_password']."</p>";
               }
             ?>
				</div>

				  <div class='col-12'>
			  <input  type='submit' class='btn btn-outline-info mt-2' value='Sign Up' style='width:100%;'>
				</div>
    		</form>
    	</div>
    </div>

          

      <?php
      include_once('myfooter.php');
      ?>        
               
               

    	
    
