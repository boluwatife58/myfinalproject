 <?php
      include_once('myheader.php');

      // include your class
         include_once('docs/userclass.php');

        //create user object
         $obj= new User;

      ?>


             
    	    <div class='row mt-4 mb-4 justify-content-center'>

    	    	<div class= ' col-sm-12  col-md-6 '>

              <?php
         if($_SERVER['REQUEST_METHOD']=='POST'){

           // validate
           $errors= array();
           if(empty($_POST['customer_name'])){
              $errors['errcustomer_name'] = "Name cannot be empty";
           }

           if(empty($_POST['customer_phone'])){
             $errors['errcustomer_phone']= "Phone Number field cannot be empty";
           }

           if(empty($_POST['customer_email'])){
             $errors['errcustomer_email']= "Email field cannot be empty";
           }
           
           if(empty($_POST['customer_address'])){
             $errors['errcustomer_address']= "Address field cannot be empty";
           }

           if(empty($_POST['customer_dob'])){
             $errors['errcustomer_dob']= "Date field cannot be empty";
           }

           if(empty($_POST['customer_password'])){
             $errors['errcustomer_password']= "Password field cannot be empty";
           }
         if(empty($errors)){
        
          // access login method
          $output = $obj->registercustomer($_POST['customer_name'],$_POST['customer_phone'], $_POST['customer_email'],$_POST['customer_address'], $_POST['customer_dob'],$_POST['customer_password']);

                if($output == true){
                      
                      // $message = "1";
                      header("Location: customersuccesspage.php");
                      exit;
                    }else{
                      echo "<div class='alert alert-danger'>Oops, could not register your details.</div>";
                    }

        }
      }
       ?>

    		<form class='row' id='user1'  method='post' action=''>
    			<div class='col-12 col-sm-12' id='form'>
                  <label for='Name'></label>				
				 <input type='text' name='customer_name' placeholder='Your Name' id='name' class='form-control' value='<?php if(isset($_POST['customer_name'])){ echo $_POST['customer_name']; } ?>'/>
             <?php
               if(isset($errors['errcustomer_name'])){
                echo "<p class='text-danger'>".$errors['errcustomer_name']."</p>";
               }
             ?>
				 </div>
				 
				 <div class='col-12 col-sm-12'>
				 <label for='Email'></label>
				 <input type='email' name='customer_email' placeholder='Enter you email address' class='form-control' id='email' value='<?php if(isset($_POST['customer_email'])){ echo $_POST['customer_email']; } ?>'/> 

         <?php
               if(isset($errors['errcustomer_email'])){
                echo "<p class='text-danger'>".$errors['errcustomer_email']."</p>";
               }
             ?>
				 </div>
				 
				  <div class='col-12'>
				 <label for='mobile'></label>
				 <input type='phone' name='customer_phone' placeholder='Enter your mobile number' id='mobile' class='form-control' value='<?php if(isset($_POST['customer_phone'])){ echo $_POST['customer_phone']; } ?>'/>
         <?php
               if(isset($errors['errcustomer_phone'])){
                echo "<p class='text-danger'>".$errors['errcustomer_phone']."</p>";
               }
             ?> 
				 </div>

                 <div class='col-12'>
                 <label for='address'></label>
                 <input type='text' name='customer_address' placeholder='Enter your address' id='address' class='form-control' value='<?php if(isset($_POST['customer_address'])){ echo $_POST['customer_address']; } ?>'/>
         <?php
               if(isset($errors['errcustomer_address'])){
                echo "<p class='text-danger'>".$errors['errcustomer_address']."</p>";
               }
             ?> 
                 </div>

                   <div class='col-12'>
                 <label for='date'></label>
                 <input type='date' name='customer_dob' placeholder='Enter your date of birth' id='date' class='form-control' value='<?php if(isset($_POST['customer_dob'])){ echo $_POST['customer_dob']; } ?>'/>
         <?php
               if(isset($errors['errcustomer_dob'])){
                echo "<p class='text-danger'>".$errors['errcustomer_dob']."</p>";
               }
             ?> 
                 </div>

           <div class='col-12'>
				 <label for='newpasswrd'></label>
				 <input type='password' name='customer_password' placeholder='Enter your password' id='newpasswrd' class='form-control' value='<?php if(isset($_POST['customer_password'])){ echo $_POST['customer_password']; } ?>'/>
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
               
               

    	
    
