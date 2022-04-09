<?php
   include_once('myporterheader.php');
     include_once('docs/userclass.php');
     
?>
<?php
              
            $custid=$_GET['id'];
              // get club details from dbtable
            $obj= new User;
            $customer = $obj->fetchCustomer($custid);
        
             //var_dump($product);
            
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $custname=$_POST['customer_name'];
            $custphone=$_POST['customer_phone'];
            $custemail=$_POST['customer_email'];
            $custaddress=$_POST['customer_address'];
            $custdob=$_POST['customer_dob'];
            

            if(empty($custname) || empty($custphone) || empty($custemail) || empty($custaddress) || empty($custdob)){
                    $error = "Please Complete all fields";
            }else{

                    // include_once('docs/members.php');

                        
                        $output=$obj->editProfile($custname,$custphone,$custemail,$custaddress,$custdob, $custid);
                       
                        if($output==true){
                            echo "<div class='alert alert-success'>Profile updated successful</div>";
                        }else{
                            echo "Error trying to edit profile";
                        }
            }
        }

?>
          <div class='row mt-4 mb-4 justify-content-center'>


            <div class= ' col-sm-12  col-md-6 '>
               <form class='row'   method='post' action=''>
            <div class='col-12 col-sm-12' id='form'>
                 <?php
                        echo $error= "Please Complete all fields";
                      ?>
                   <h4>EDIT PROFILE</h4>

                  <label for='Name'>Fullname:</label>          
             <input type='text' name='customer_name' placeholder='Fullname' id='name' class='form-control' value='<?php if(isset($customer['customer_name'])){ echo $customer['customer_name'];}?>'/>
                  
             </div>
             
             
             
              <div class='col-12 mt-3'>
             <label for='phone'>Phone number:</label>
             <input type='phone' name='customer_phone' placeholder='Enter your phone' id='phone' class='form-control' value='<?php if(isset($customer['customer_phone'])){ echo $customer['customer_phone'];}?>'/>
               
             </div>
             
                 <div class='col-12 mt-3'>
             <label for='email'>Email Address:</label>
             <input type='email' name='customer_email' placeholder='Enter your email' id='email' class='form-control' value='<?php if(isset($customer['customer_email'])){ echo $customer['customer_email'];}?>'/>
               
             </div>
                 
                <div class='col-12 mt-3'>
             <label for='address'>Address:</label>
             <input type='text' name='customer_address' placeholder='Enter your address' id='address' class='form-control' value='<?php if(isset($customer['customer_address'])){ echo $customer['customer_address'];}?>'/>
               
             </div> 
             
                 <div class='col-12 mt-3'>
             <label for='dob'>Date of Birth:</label>
             <input type='date' name='customer_dob' placeholder='Enter your date of birth' id='dob' class='form-control' value='<?php if(isset($customer['customer_dob'])){ echo $customer['customer_dob'];}?>'/>
               
             </div>

              <div class='col-12'>
           <input  type='submit' class='btn btn-outline-info mt-2' value='Save Changes' style='width:100%;'>
            </div>
         </form>
      </div>
    </div>
<?php
    include_once('myporterfooter.php');
?>
   
