<?php
        session_start();
        $userid=$_SESSION['customerid'];
        $ref=$_GET['reference'];
        $custid=$_SESSION['custid'];
    include_once('docs/userclass.php');
     
     // create object of class
    $obj= new User;
    $outcome=$obj->updateCustorder($ref,$custid);
    $delete=$obj->emptycart($userid);
    if($delete==true){
        header("Location: homepage2.php");
    }else{
        header("Location: orders.php");
      }
?> 

<?php
include_once('myporterheader1.php');

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
           if(empty($_POST['name'])){
              $errors['name'] = "Name cannot be empty";
           }

           if(empty($_POST['phone_number'])){
             $errors['phone_number']= "phone_number field cannot be empty";
           }

           if(empty($_POST['delivery_address'])){
             $errors['delivery_address']= "delivery_address field cannot be empty";
           }

         if(empty($errors)){
        // include your class
         include_once('docs/userclass.php');

        //create user object
         $obj= new User;

          // access login method
          $message = $obj->logincustomers($_POST['name'], $_POST['phone_number'],$_POST['delivery_address']);

           if ($message){
            // redirect to dashboard.php
               header("Location: homepage2.php");
               exit;
             }else{
              echo "<div class='alert alert-danger'>Connection Unsucessful</div>";
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
        <form class='row' method='post' action=''>
                          
                           <h1 class=" mb-3 text-center">Delivery
                                  <small>Details</small>
                              </h1>

                  <div class='col-12 col-sm-12' id='form'>
                    <label for='name'></label>
                   <input type="text" name="name" placeholder="Enter your Name" class='form-control' id='name'>

                      <label for='phone'></label>
                   <input type="phone" name="phone_number" class='form-control mt-2' placeholder="Enter phone Number" id='phone'>

                   <label for='address'>Delivery Address</label>
                   <textarea class='form-control mt-2' id='address' name='delivery_address'></textarea>

                   <input type='submit' class='btn btn-outline-info mt-2' value='Submit' style='width:100%;'>
                 </div>
                </form>
    </div>
  </div>

<?php
  include_once('myporterfooter');
?>