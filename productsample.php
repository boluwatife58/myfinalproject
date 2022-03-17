<?php
   include_once('myporterheader.php');


    // include your class
         include_once('docs/members.php');

         

        //create user object
         $obj= new Seller;

?>

          <div class='row mt-4 mb-4 justify-content-center'>

             <?php
         if($_SERVER['REQUEST_METHOD']=='POST'){

           // validate
           $errors= array();
           if(empty($_POST['product_name'])){
              $errors['errproduct_name'] = "Product Name field is Required";
           }

           if(empty($_POST['product_description'])){
             $errors['errproduct_description']= "Product Description  is Required";
           }
           
           if(empty($_POST['product_price'])){
             $errors['errproduct_price']= "Product Price field is Required";
           }
           if(empty($_FILES['seller_image'])){
              $errors['errsellerimage'] = " Product Image is required!";
            }

           if(empty($_POST['product_type_id'])){
             $errors['errproduct_type']= "Product type field is Required";
           }

           if(empty($_POST['seller_id'])){
             $errors['errseller_name']= "Seller's name field is Required";
           }
         if(empty($errors)){
        



          // access login method
          $output = $obj->insertProducts($_POST['product_name'], $_POST['product_description'], $_POST['product_price'], $_POST['product_type_id']);
                if($output == true){
                      
                       $message = "1";
                      header("Location: mydashboard.php");
                      exit;
                    }else{
                      echo "<div class='alert alert-danger'>Oops, could not add your product.</div>";
                    }

        }
      }
       ?>


            <div class= ' col-sm-12  col-md-6 '>
               <form class='row'   method='post' action='' enctype="multipart/form-data">
            <div class='col-12 col-sm-12' id='form'>
                   <h4>ADD PRODUCT</h4>

                  <label for='Name'>Product Name:</label>          
             <input type='text' name='product_name' placeholder='Product Name' id='name' class='form-control' value='<?php if(isset($_POST['product_name'])){ echo $_POST['product_name'] ;}?>'/>
                   <?php
                       if(isset($errors['errproduct_name'])){
                        echo "<p class='text-danger'>".$errors['errproduct_name']."</p>";
                       }
                   ?>
             </div>
             
             <div class='col-12 col-sm-12 mt-3'>
             <label for='description'>Product Description:</label>
             <textarea name='product_description' class='form-control' id='description' value='<?php if(isset($_POST['product_description'])){ echo $_POST['product_description']; }?>'></textarea>
             <?php
                       if(isset($errors['errproduct_description'])){
                        echo "<p class='text-danger'>".$errors['errproduct_description']."</p>";
                       }
                   ?> 
             </div>
             
              <div class='col-12 mt-3'>
             <label for='price'>Product Price:</label>
             <input type='text' name='product_price' placeholder='Enter your price' id='price' class='form-control' value='<?php if(isset($_POST['product_price'])){ echo $_POST['product_price']; }?>'/>
                <?php
                       if(isset($errors['errproduct_price'])){
                        echo "<p class='text-danger'>".$errors['errproduct_price']."</p>";
                       }
                   ?>
             </div>
             <div class='col-12 mt-3'>
             <label for='image'>Product Image:</label>
             <input type='file' name='product_image' id='image' class='form-control' />
                  <?php
                       if(isset($errors['errproduct_image'])){
                        echo "<p class='text-danger'>".$errors['errproduct_image']."</p>";
                       }
                   ?>
             </div>
           <div class='col-12 mt-3'>
              <label>Product Type: </label><br/>
                  <select name='product_type_id' id='product_type' class='form-control'>
                      <option value=''>Select a product type</option>
                       <?php
                         //make reference to getCountry()
                     $product = $obj->getProducttype();
                     foreach ($product as $key => $value) {
                        $protypeid= $value['product_type_id'];
                        $protypename= $value['product_type'];
                       echo "<option value='$protypeid'>$protypename</option>";
                     
                     ?>
                      <?php
                        }
                      ?>
                  </select>
                   <?php
                       if(isset($errors['errproduct_type'])){
                        echo "<p class='text-danger'>".$errors['errproduct_type']."</p>";
                       }
                   ?>
            </div>

                 

              <div class='col-12'>
           <input  type='submit' class='btn btn-outline-info mt-2' value='Add Product' style='width:100%;'>
            </div>
         </form>
      </div>
    </div>
<?php
    include_once('myporterfooter.php');
?>