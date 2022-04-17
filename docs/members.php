   <?php
   // include constant
    include_once('constant.php');

    class Seller{
    	//member variables or properties
    	public $name;
    	public $email;
    	public $phone;
    	public $password;
    	public $dbcon; //objecthandler

        //method member
        function __construct(){
          // to connect to database by initializing Mysqli class
        	$this->dbcon= new Mysqli(DB_SERVER_NAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE_NAME);
           
           // check the connection
        	if($this->dbcon->connect_error){
        		die ('connection failed'. $this->dbcon->connect_error);
        	}else{

        	}
        }



        function registerSeller($name, $email, $phone, $pswd){
        	// hash password
        	$password=password_hash($pswd, PASSWORD_DEFAULT);

        	// write query
        	$sql = "INSERT INTO seller SET seller_name='$name', seller_email='$email', seller_phone='$phone', seller_password='$password'  ";

        	// run the query
        	$result= $this->dbcon->query($sql);

        	// check if there is error
        	 $message= array();
        	if($this->dbcon->error){
               $message['error']= "Could not add your detail".$this->dbcon->error;
        	}else{
        		$message['success']= "Successfully added";
        	}
        	return $message; 
        }

                 
                #check seller email
        function checkEmail($email){
          $sql="SELECT * FROM seller WHERE seller_email='$email' ";
          // var_dump($sql);
          // exit;
          $result=$this->dbcon->query($sql);
          if($this->dbcon->affected_rows==1){
             return true;    
          }else{
            return false;
          }

        }
                #end check seller email

                  #begin seller login
                   
                   function loginSeller($email, $pswd){

                    // write query
                    $insert_query= "SELECT  * from seller WHERE seller_email='$email' ";

                    // run the query
                    $result= $this->dbcon->query($insert_query);
                     if($result->num_rows==1){
                        $row= $result->fetch_assoc();
                        $confirm= password_verify($pswd, $row['seller_password']);

                        if($confirm){
                            // session variables
                            session_start();
                            $_SESSION['sellername']= $row['seller_name'];
                            $_SESSION['sellerid'] = $row['seller_id'];
                            $_SESSION['productid'] = $row['product_id'];
                             $_SESSION['mylogchecker']=  "Rt_0_0_cMeg";
                             return true;
                              }else{
                                  return false;
                              }

                        }
                     }

                  #end seller login

                      # begin get product type
         function getProducttype(){;
         // write query
         $sql = "SELECT * FROM product_type";

         // run query
         $result= $this->dbcon->query($sql);

           $product = array();
           if ($result->num_rows > 0) {
            // loop through result set and fetch all records
              while ($row = $result->fetch_assoc()) {
                $product[] = $row;
              }

              return $product;
           }else{
               
               return $product;
             }
          } 
        #end get product type




          #begin insert product into database

            public function insertProducts($productname, $productdesc, $productprice,$protype){
            $sellerid=$_SESSION['sellerid'];
                  
                      // call upload file function
              $productimage= $this->uploadFiles();

              if($productimage != false){  

            // write query
            $sql= "INSERT INTO product SET product_name='$productname', product_description= '$productdesc', product_price='$productprice',product_type_id='$protype', seller_id='$sellerid', seller_image='$productimage' ";






            // run the query
            $result= $this->dbcon->query($sql);
            if($this->dbcon->affected_rows==1){
                return true;
            }else{
                return false;
            }
          
             }
         }
          #end insert product into database


              # begin upload file
            public function uploadFiles(){

              //variables to access and upload files

    $filename =$_FILES['proimage']['name']; // original filename

    $filesize=$_FILES['proimage']['size'];

    $tmp_name=$_FILES['proimage']['tmp_name']; // this is the temporary directory (folder)

    $filetype=$_FILES['proimage']['type']; //mime type

    $error=$_FILES['proimage']['error'];

    //check if file uploaded
    if ($error > 0) {
      die("No file uploaded!");
    }

    
    //  check the file size 
    if ($filesize > 2097152){
      die ("File size should not be more than 2mb");
    }

      $extensions = array ('jpg', 'png', 'jpeg', 'gif', 'svg');

      // get the uploaded file extension
       $file_ext= explode(".", $filename);
       $the_file_ext = end($file_ext); // to pick the last extension of an array

      // check if the file extension is allowed
      if (!in_array(strtolower($the_file_ext), $extensions)) {
          die("File type not allowed");
      }
     

     // destination folder
      $folder = "uploads/";

      $new_filename= rand().time().".".$the_file_ext;

      $destination = $folder.$new_filename;

      //move the file from temporary folder to destination
      if (move_uploaded_file($tmp_name, $destination)) {
        return $new_filename;
      }else{
        return false;
      }

        }
               
         #end upload file


          # begin get product
         function getProducts(){;
          $sellerid=$_SESSION['sellerid'];
         // write query
         $sql = "SELECT * FROM product JOIN product_type ON product.product_type_id= product_type.product_type_id JOIN seller ON product.seller_id= seller.seller_id WHERE seller.seller_id='$sellerid' ";
        

         // run query
         $result= $this->dbcon->query($sql);

           $records = array();
           if ($result->num_rows > 0) {
            // loop through result set and fetch all records
              while ($row = $result->fetch_assoc()) {
                $records[] = $row;
              }

              return $records;
           }else{
               
               return $records;
             }
          } 
        #end get product

         # begin find product
           public function findProducts($proid){;
            // write query
           $sql = "SELECT * FROM product WHERE product_id = '$proid' ";

           //run query
           $record = $this->dbcon->query($sql);

           if($record->num_rows ==1){
            $row=$record->fetch_assoc();
              return $row;
           }else{
             return false;
           }
         }

         # end find product 


        
         # begin edit product
             public function updateProducts($productname, $productdesc, $productprice,$protype, $productimage, $proid){
               $sellerid=$_SESSION['sellerid']; 
                 // call upload file function
                if(isset($_FILES['error']) && $_FILES['proimage']['error']== 0){
                     $productimage= $this->uploadFiles();
                 }else{
                    $productimage = $proimage;
                 }
            
                   //var_dump($productimage);   
                   // exit;
                    
                   $productimage= $this->uploadFiles();

                if($productimage != false){

                

                // write sql query
             $sql = "UPDATE product SET product_name='$productname', product_description= '$productdesc', product_price='$productprice',product_type_id='$protype', seller_id='$sellerid', seller_image='$productimage' WHERE product_id='$proid' ";
                 
                 //run the query
             $result= $this->dbcon->query($sql);
             // var_dump($sql); exit;

             if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows == 0){
                return true;
             }else{
                return false;
             }

         }

             }

          #end edit product 

          #  begin delete product
             public function deleteProducts($proid){
              // $sellerid=$_SESSION['sellerid']; 
                 // call upload file function
                if(isset($_FILES['proimage']) && $_FILES['error']== 0){
                     $productimage= $this->uploadFiles();
                 }else{
                  
                 }
            
                  
                // write sql query
             $sql = "DELETE FROM `product` WHERE`product_id` ='$proid' ";
                 
                 //run the query
             $result= $this->dbcon->query($sql);
             // var_dump($sql); exit;

             if ($this->dbcon->affected_rows ==1 ){
                return true;
             }else{
                return false;
             }

         

             }
          # end delete product 


          
        # begin get products 

           public function getProd($protypeid){
              // write query
         $sql = "SELECT * FROM product WHERE product_id='$protypeid' ";
         // var_dump($sql);
          //exit;
         // run query
         $result= $this->dbcon->query($sql);

           $records = array();
           if ($this->dbcon->affected_rows > 0) {
            // loop through result set and fetch all records
              while ($row = $result->fetch_assoc()) {
                $records[] = $row;

              }

              return $records;
           }else{
               
               return $records;
             }
           }

       # end get products

        # begin find product for category
           public function findcat($protypeid){;
            // write query
           $sql = "SELECT * FROM product WHERE product_type_id = '$protypeid' ";
              // var_dump($sql);
              //   exit;
           //run query
           $record = $this->dbcon->query($sql);
               
               $records = array();
           if($record->num_rows > 0){
             while ($row = $record->fetch_assoc()) {
                $records[] = $row;
              }
              return $records;
           }else{
             return false;
           }
         }

         # end find product  for catagory






        # begin get products to homepage

           public function getProdhome($prodtypeid){
              // write query
         $sql = "SELECT * FROM product WHERE product_type_id='$prodtypeid' order by rand() LIMIT 4 ";
         // run query
         $result= $this->dbcon->query($sql);

           $records = array();
           if ($this->dbcon->affected_rows > 0) {
            // loop through result set and fetch all records
              while ($row = $result->fetch_assoc()) {
                $records[] = $row;

              }

              return $records;
           }else{
               
               return $records;
             }
           }
       # end get products to homepage  


        //     # begin get orders
        //  function getOrders(){;
        //   $sellerid=$_SESSION['sellerid'];
        //  // write query
        //  $sql = "SELECT * FROM orders JOIN product_type ON product.product_type_id= product_type.product_type_id JOIN seller ON product.seller_id= seller.seller_id WHERE seller.seller_id='$sellerid' ";
        

        //  // run query
        //  $result= $this->dbcon->query($sql);

        //    $records = array();
        //    if ($result->num_rows > 0) {
        //     // loop through result set and fetch all records
        //       while ($row = $result->fetch_assoc()) {
        //         $records[] = $row;
        //       }

        //       return $records;
        //    }else{
               
        //        return $records;
        //      }
        //   } 
        // #end get orders
    }

   ?>