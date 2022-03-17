<?php
   include_once('myporterheader.php');
     include_once('docs/members.php');
     $obj= new Seller;
?>
<?php
            
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $productname=$_POST['pdname'];
            $productdesc=$_POST['prodesc'];
            $productprice=$_POST['proprice'];
            $producttype=$_POST['protype_id'];
            $productimage=$_FILES['proimage'];

            if(empty($productname) || empty($productdesc) || empty($productprice) || empty($producttype) || empty($productimage)){
                    $error = "Please Complete all fields";
            }else{

                    // include_once('docs/members.php');

                        
                        $output=$obj->insertProducts($productname,$productdesc,$productprice,$producttype);
                       
                        if($output==true){

                              $message= "1";
                            header("Location: listproducts.php?msg=$message");
                        }else{
                            echo "Error trying to add a product";
                        }
            }
        }

?>
          <div class='row mt-4 mb-4 justify-content-center'>


            <div class= ' col-sm-12  col-md-6 '>
               <form class='row'   method='post' action='' enctype="multipart/form-data">
            <div class='col-12 col-sm-12' id='form'>
                 <?php
                        echo $error= "Please Complete all fields";
                      ?>
                   <h4>ADD PRODUCT</h4>

                  <label for='Name'>Product Name:</label>          
             <input type='text' name='pdname' placeholder='Product Name' id='name' class='form-control' value='<?php if(isset($_POST['pdname'])){ echo $_POST['pdname'];}?>'/>
                  
             </div>
             
             <div class='col-12 col-sm-12 mt-3'>
             <label for='description'>Product Description:</label>
             <textarea name='prodesc' class='form-control' id='description' value='<?php if(isset($_POST['prodesc'])){ echo $_POST['prodesc'];}?>'></textarea>
            
             </div>
             
              <div class='col-12 mt-3'>
             <label for='price'>Product Price:</label>
             <input type='text' name='proprice' placeholder='Enter your price' id='price' class='form-control' value='<?php if(isset($_POST['proprice'])){ echo $_POST['proprice'];}?>'/>
               
             </div>
             <div class='col-12 mt-3'>
             <label for='image'>Product Image:</label>
             <input type='file' name='proimage' id='image' class='form-control' />
                  
             </div>
           <div class='col-12 mt-3'>
              <label>Product Type: </label><br/>
                  <select name='protype_id' id='product_type' class='form-control'>
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