<?php
   include_once('myporterheader.php');
     include_once('docs/members.php');
     
?>
<?php
              
            $proid=$_GET['id'];
              // get club details from dbtable
            $obj= new Seller;
            $product = $obj->findProducts($proid);
        
             //var_dump($product);
            
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

                        
                        $output=$obj->updateProducts($productname,$productdesc,$productprice,$producttype,$productimage, $proid);
                       
                        if($output==true){
                            header("Location: listproducts.php");
                        }else{
                            echo "Error trying to add a product";
                        }
            }
        }

?>
          <div class='row mt-4 mb-4 justify-content-center'>


            <div class= ' col-sm-12  col-md-6 '>
               <form class='row'   method='post' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id= <?php echo $_GET['id']; ?>' enctype="multipart/form-data">
            <div class='col-12 col-sm-12' id='form'>
                 <?php
                        echo $error= "Please Complete all fields";
                      ?>
                   <h4>EDIT PRODUCT</h4>

                  <label for='Name'>Product Name:</label>          
             <input type='text' name='pdname' placeholder='Product Name' id='name' class='form-control' value='<?php if(isset($product['product_name'])){ echo $product['product_name'];}?>'/>
                  
             </div>
             
             <div class='col-12 col-sm-12 mt-3'>
             <label for='description'>Product Description:</label>
             <textarea name='prodesc' class='form-control' id='description' value="<?php if(isset($product['product_description'])){ echo $product['product_description'];}?>"></textarea>
             </div>
             
              <div class='col-12 mt-3'>
             <label for='price'>Product Price:</label>
             <input type='text' name='proprice' placeholder='Enter your price' id='price' class='form-control' value='<?php if(isset($product['product_price'])){ echo $product['product_price'];}?>'/>
               
             </div>
             
                <div class=" col-12 mt-3">
            <div class="controls">
                <img src="uploads/<?php echo $product['seller_image']?>" alt='image' style='width:50px;'>
             <label for='image'>Product Image:</label>
             <input type='file' name='proimage' id='image' class='form-control' />
                 </div> 
             </div>
           <div class='col-12 mt-3'>
              <label>Product Type: </label><br/>
                  <select name='protype_id' id='product_type' class='form-control'>
                      <option value=''>Select a product type</option>
                       <?php
                         //make reference to getProduct()

                     $product = $obj->getProducttype();

                     foreach ($product as $key => $value) {
                        $protypeid= $value['product_type_id'];
                        $protypename= $value['product_type'];



                         if(isset($product['product_type_id']) && $product['product_type']== $protypeid){
                             echo "<option  selected value='$protypeid' >$protypename</option>";
                        }else{
                       echo "<option value='$protypeid' >$protypename</option>";
                        }
                      
                     
                  
                      
                        }
                      ?>
                  </select>
                  
            </div>

                 
                  <input type="hidden" name="proimage" value="<?php if(isset($product['proimmage'])){
            echo $product['proimage']; }?>">

            <input type="hidden" name="proid" value="<?php if(isset($product['product_id'])){
            echo $product['product_id']; }?>">
              <div class='col-12'>
           <input  type='submit' class='btn btn-outline-info mt-2' value='Save Changes' style='width:100%;'>
            </div>
         </form>
      </div>
    </div>
<?php
    include_once('myporterfooter.php');
?>
   
