<?php
      include_once('myheader.php');

      // include your class
         include_once('docs/userclass.php');

        //create user object
         $obj= new User;

      ?>
  
                 <div class='row justify-content-center mb-5'>
              <div class='col-md-6'>

              <?php
         if($_SERVER['REQUEST_METHOD']=='POST'){

           // validate
           $errors= array();
           if(empty($_POST['email'])){
              $errors['email'] = "Email address cannot be empty";
           }

           if(empty($_POST['password'])){
             $errors['password']= "Password field cannot be empty";
           }

         if(empty($errors)){
        // include your class
         include_once('docs/userclass.php');

        //create user object
         $obj= new User;

          // access login method
          $message = $obj->logincustomers($_POST['email'], $_POST['password']);

           if ($message){
            // redirect to dashboard.php
               header("Location: homepage2.php");
               exit;
             }else{
              echo "<div class='alert alert-danger'>Invalid Email and Password</div>";
             }

        }else{
              echo "<ul class='alert alert-danger'>";        
           foreach($errors as $key => $value){
              echo  " <li>$value</li> ";
           }
            echo "</ul>";
        }
      }
       ?>
                
                 <form class='row' id='user2' method='post' action=''>
                          
                           <h1 class=" mb-3 text-center">LOGIN
                                  <small></small>
                              </h1>

                  <div class='col-12 col-sm-12' id='form'>
                    <label for='email'></label>
                   <input type="email" name="email" placeholder="Enter your Email address" class='form-control' id='email'>

                      <label for='password'></label>
                   <input type="password" name="password" class='form-control mt-2' placeholder="Enter password" id='password'>

                   <input type='submit' class='btn btn-outline-info mt-2' value='Log In' style='width:100%;'>
                 </div>
                </form>
              </div>
            </div>

 <?php
      include_once('myfooter.php');
      ?>        
       