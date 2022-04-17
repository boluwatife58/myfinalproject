<?php
// include constant
    include_once('constant.php');

    class User{
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

        # begin insert into customers


            function registercustomer($name,$phone, $email,$address, $dob, $pswd){
            // hash password
            $password=password_hash($pswd, PASSWORD_DEFAULT);

            // write query
            $sql = "INSERT INTO customer SET customer_name='$name',customer_phone='$phone', customer_email='$email',customer_address='$address', customer_dob='$dob', customer_password='$password'  ";

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

                 # end insert into customers


                  #begin customer login
                   
                   function logincustomers($email, $pswd){

                    // write query
                    $insert_query= "SELECT  * from customer WHERE customer_email='$email' ";

                    // run the query
                    $result= $this->dbcon->query($insert_query);
                     if($result->num_rows==1){
                        $row= $result->fetch_assoc();
                        $confirm= password_verify($pswd, $row['customer_password']);

                        if($confirm){
                            // session variables
                            session_start();
                            $_SESSION['customername']= $row['customer_name'];
                            $_SESSION['customerid'] = $row['customer_id'];
                           $_SESSION['sellerid'] = $row['seller_id'];
                            $_SESSION['orderid'] = $row['order_id'];
                            $_SESSION['mylogchecker']=  "Rt_0_0_cMeg";
                             return true;
                              }else{
                                  return false;
                              }

                        }
                     }

                  #end customer login     

                   #insert into table cart
                   function insertCart($productid, $sellerid,$user, $quantity){
                    
                    // write query
                    $sql="INSERT INTO cart SET product_id='$productid',seller_id='$sellerid', customer_id='$user', quantity='$quantity' ";

                    // run query
                    $result= $this->dbcon->query($sql);
                     // $this->insertCustOrder($productid, $sellerid,$user, $quantity);
                        if($this->dbcon->affected_rows==1){
                        return true;
                     }else{
                       return false; 
                     }
          
                    }
                   
                    #end insert into table cart 

                    #begin fetch all products from cart
                   public function selectallfromcart($id){
        $sql = "SELECT * FROM cart JOIN product ON cart.product_id=product.product_id WHERE customer_id= $id && status = 'pending'";

        $result = $this->dbcon->query($sql);
        // var_dump($result);
        $row = [];
        if($this->dbcon->affected_rows > 0){
            while($rec= $result->fetch_assoc()){
                $row[] = $rec;
            }return $row;
        }else{
            return $row;
        }

    }
                    #end fetch all products from cart


                  # begin find user
           public function findCustomer($custid){;
            // write query
           $sql = "SELECT * FROM customer WHERE customer_id = '$custid' ";

           //run query
           $record = $this->dbcon->query($sql);

           if($record->num_rows ==1){
            $row=$record->fetch_assoc();
              return $row;
           }else{
             return false;
           }
         }

         # end find user

         # begin edit user profile
        public function editProfile($custname,$custphone,$custemail,$custaddress,$custdob,$custid){

          // write query
          $sql="UPDATE customer SET customer_name='$custname',customer_phone='$custphone',customer_email='$custemail',customer_address='$custaddress',customer_dob='$custdob' WHERE customer_id='$custid' " ;
          $result=$this->dbcon->query($sql);
          if($this->dbcon->affected_rows ==1){
            return true;
          }else{
            return false;
          } 
         }
         #end edit user profile
        
         #begin get all user
         public function fetchCustomer($custid){
           $sql="SELECT customer_name,customer_phone, customer_email,customer_address,customer_dob FROM customer WHERE customer_id='$custid' ";

           $result=$this->dbcon->query($sql);
           $records=array();
           if($this->dbcon->affected_rows > 0){
               while($row=$result->fetch_assoc()){
                $records[]=$row;
               }
               return $records;
           }else{
            return $records;
           }
         }
         #end get all user

          #  begin delete orders
             public function deleteorder($cartid){
              
            
                  
                // write sql query
             $sql = "DELETE FROM `cart` WHERE`cart_id` ='$cartid' ";
                 
                 //run the query
             $result= $this->dbcon->query($sql);
             // var_dump($sql); exit;

             if ($this->dbcon->affected_rows ==1 ){
                return true;
             }else{
                return false;
             }

         

             }
          # end delete orders

           #  begin delete  from customer_orders
             public function deletecustorder($custordid){
              
            
                  
                // write sql query
             $sql = "DELETE FROM `customer_order` WHERE`customer_order_id` ='$custordid' ";
                 
                 //run the query
             $result= $this->dbcon->query($sql);
             // var_dump($sql); exit;

             if ($this->dbcon->affected_rows ==1 ){
                return true;
             }else{
                return false;
             }

         

             }
          # end delete customer_orders   

          #begin get total quantity
          function totalquantity($custid){
            $sql="SELECT SUM(quantity) AS totalquantity FROM cart WHERE customer_id='$custid' AND status='pending' ";
             $result=$this->dbcon->query($sql);
             // var_dump($sql);
             // exit;
             if($this->dbcon->affected_rows > 0){
                $row=$result->fetch_assoc();
                $total= $row['totalquantity'];
                return $total;
             }else{
                return $total;
             }
          }
          #end get total quantity  

            #begin get total price
          function totalPrice($custid){
            $sql="SELECT  SUM(product_price* quantity) AS totalprice FROM cart JOIN product ON cart.product_id=product.product_id WHERE customer_id='$custid' AND status='pending' ";
             $result=$this->dbcon->query($sql);
             
             if($this->dbcon->affected_rows > 0){
                $row=$result->fetch_assoc();
                $total= $row['totalprice'];
                return $total;
             }else{
                return $total;
             }
          }
          #end get total price 

          #get user email
          function getEmail($id){
            $sql="SELECT * FROM customer where customer_id='$id'";
            $result=$this->dbcon->query($sql);
            if($this->dbcon->affected_rows==1){
                    $row=$result->fetch_assoc();
                    $email=$row['customer_email'];
                    return $email;
            }else{
                return $email;
            }
          }
             #end get user email

          
            # begin insert transaction details
             public function insertTransDetails($amount, $userid,$transref){
                // write sql query
             $sql = "INSERT INTO orders SET total_amount='$amount', customer_id='$userid',status='pending', trans_reference='$transref' ";
                // var_dump($sql); exit;
                 //run the query
             $result= $this->dbcon->query($sql);

             if ($this->dbcon->affected_rows ==1){
                return true;
             }else{
                return false;
             }

         }
          #end insert transaction details

         # begin insert cust order
         public function insertCustOrder($productid, $sellerid,$user, $quantity){
            
            //write query
            $sql="INSERT INTO customer_order SET product_id='$productid',seller_id='$sellerid', customer_id='$user', quantity='$quantity' ";
             // var_dump($sql);
             // exit;
            $result=$this->dbcon->query($sql);
            if($this->dbcon->affected_rows == 1){
                 $last=$this->dbcon->insert_id;
                 $b=$_SESSION['custid']=$last;
                 //$this->insertDelivery($user,);
                return true;
            }else{
                return false;
            }
         }
         #end insert cust order
         // #start insert Delivery
         // public function insertDelivery($userid, $orderid){
         //    $userid=$_SESSION['customerid'];
         //    $sql="INSERT INTO delivery set customer_id='$userid', order_id='$orderid'";
         //    $result=$this->dbcon->query($sql);
         //    if ($this->dbcon->affected_rows == 1) {
         //        return true;
         //    }
         //    else{
         //        return false;
         //    }
         // }

         // public function updateDelivery($name,$phone,$address,$order){
         //    //$order=$_SESSION['orderid'];
         //    $sql="UPDATE delivery SET name='$name', phone_number='$phone', delivery_address='$address',delivery_status='pending' WHERE order_id='$order'";
         //    // var_dump($sql);
         //    // exit;
         //    $result=$this->dbcon->query($sql);

         //    if($this->dbcon->affected_rows == 1){
         //        return true;
         //    }else{
         //        return false;
         //    }
         // }
         // #end insert Delivery

         #begin update orders from cust order
          public function updateCustorder($custid){
            $userid=$_SESSION['customerid'];
            // write query
            $sql="UPDATE customer_order SET status='paid' WHERE customer_id='$userid' ";

            $result=$this->dbcon->query($sql);
            if($this->dbcon->affected_rows==1){
                return true;
            }else{
                return false;
            }
          }
         #end update orders from cust order
   
           #begin get all orders
           public function getOrders(){
            $sellerid=$_SESSION['sellerid'];
            // write query
            $sql="SELECT * FROM customer_order join customer ON customer_order.customer_id=customer.customer_id JOIN product ON customer_order.product_id=product.product_id JOIN seller ON customer_order.seller_id=seller.seller_id  where seller.seller_id='$sellerid' ";
               
               $record=array();
            $result=$this->dbcon->query($sql);
            if($this->dbcon->affected_rows > 0){
              while($row= $result->fetch_assoc()){
                $record[] = $row;
              }
              return $record;
            }else{
                return $record;
            }
           }
           #end get all orders

            #begin get all orders
           public function getOrderpayment(){
            $sellerid=$_SESSION['sellerid'];
            // write query
            $sql="SELECT * FROM customer_order join customer ON customer_order.customer_id=customer.customer_id JOIN product ON customer_order.product_id=product.product_id JOIN seller ON customer_order.seller_id=seller.seller_id  where seller.seller_id='$sellerid' AND status='paid' ";
               
               $record=array();
            $result=$this->dbcon->query($sql);
            if($this->dbcon->affected_rows > 0){
              while($row= $result->fetch_assoc()){
                $record[] = $row;
              }
              return $record;
            }else{
                return $record;
            }
           }
           #end get all orders

         # initialize paystack transaction
           public function initializePaystack($amount, $email, $reference){
                $url= "https://api.paystack.co/transaction/initialize";
                $callbackurl= "http://localhost/harryproject/paystackcallback.php";

                $fields=[
                   'email'=> $email,
                    'amount'=> $amount * 100,
                    'reference'=> $reference,
                    'callback_url'=> $callbackurl
                ];

                $fields_string= http_build_query($fields);

                // step 1: open connection
                $ch= curl_init();

                // step 2: set call options
                 curl_setopt($ch,CURLOPT_URL, $url);
                   curl_setopt($ch,CURLOPT_POST, true);
                    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                       curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                            "Authorization: Bearer sk_test_50e3ec951849f7d27b68b7e5ac2e03c849fd63af",
                                 "Cache-Control: no-cache",
                       ));
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    //step 3 execute curl
                   $result= curl_exec($ch);

           // check if there is error
         if (curl_error($ch)) {
            var_dump(curl_error($ch));
         }

         //step 4 close curl session
         Curl_close($ch);

         // step 5: convert json data to array
         $response = json_decode($result, true);

         return $response;

           }
         # end initialize  paystack transaction

         

              #  begin empty cart
             public function emptycart($custid){
           // write sql query
             $sql = "DELETE FROM cart WHERE customer_id ='$custid' ";
                 
                 //run the query
             $result= $this->dbcon->query($sql);
             // var_dump($sql); exit;

             if ($this->dbcon->affected_rows > 0 ){
                return true;
             }else{
                return false;
             }
        }
          # end empty cart

        # begin edit cart
        function updateCart($status, $id){
          $sql="UPDATE cart SET status='$status' WHERE customer_id='$id' ";

          $result=$this->dbcon->query($sql);
          if($this->dbcon->affrected_rows > 0){
            return true;
          }else{
            return false;
          }
        }
        #end edit cart

        
}
?>