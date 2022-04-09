<?php
include_once('myporterheader1.php');
include_once('docs/userclass.php');

   
   


?>
<div class="container">
<h3 style='color:blue;'><b>YOUR CART</b></h3>
<hr>
<div class="row">
<div class="col-md">Items</div>
<div class="col-md">Quantity</div>
<div class="col-md">Price</div>
<div class="col-md">Check</div>
</div>

<?php
     // $proid=$_GET['id'];
     // var_dump($proid);
     // exit;
if (!empty($_SESSION['customerid'])){      
        $userid=$_SESSION['customerid'];
        
      }
      $cart = new User;
$recs = $cart->selectallfromcart($userid);
// echo '<pre>';
// print_r($recs);
// echo '</pre>';  
?>
<div class="row wrapper">
<?php
foreach ($recs as $key => $value) {
        $id = $value['cart_id'];
?>
<div class="col-md-3">
<img src="uploads/<?php echo $value['seller_image']; ?>" class="img-small" style="height:200px; width: 200px">
<h5 style="color: blue;"><?php echo $value['product_name']?></h5>

</div>
<div class="col-md-3">
<input type="number" name="qty" id="quantity" value="<?php echo $value['quantity'];?>" class="mt-5 qty" readonly >
</div>
<div class="col-md-3">
<input type="text" name="price" class="mt-5 price" value="<?php echo $value['product_price']?>" readonly>
</div>

<div class="col-md-3 mt-5 value" name="totalprice">
<?php
$price= $value['product_price'];
$quantity= $value['quantity'];
$total=$price*$quantity;
echo $total;
$transref= "CH".rand().time();


// if($_SERVER['REQUEST_METHOD']=='POST'){
//         // insert transaction details
//          if($_POST['trans_action']=='insert'){
            
//             $output= $obj->insertTransDetails($totprice,  $userid, $transref);

//             var_dump($output);
//             exit;

//          }
//       }

?>
</div>
<div class="col-md-3 mt-5">
  <a href='deleteorders.php?id=<?php echo $id; ?>' class='btn btn-danger btn-sm'>
<i class='fa fa-trash'></i> Remove</a>  
</div>
<hr>
       
<?php }?>
</div>
  <div class='row'>
          <div class='col'>
                <?php
                   include_once('docs/userclass.php');
                   $obj = new User;
                   $tot= $obj->totalquantity($userid);
                   $totprice=$obj->totalprice($userid);
                   $email=$obj->getEmail($userid);

                ?>

                <!-- <p>Total quantity: <?php  echo $tot ?></p> -->
                <p><span style='font-weight: bold;'>Total price:</span> <?php  echo $totprice ?></p>
              
          </div>
  </div>
     
     <div class='row'>
             <div class='col'>
                     <form action='paystacktransaction.php' method='post'>
                        <input type="hidden" name="total_amount" value='<?php echo $totprice ?>'>
                         <input type='hidden' name='price' value='<?php echo $price ?>'>
                         <input type='hidden' name='quantity' value='<?php echo $quantity ?>'>
                         <input type='hidden' name='seller_id' value='<?php echo $sellerid ?>'>
                         <input type='hidden' name='order_id' value='<?php echo $orderid ?>'>
                        <input type="hidden" name="userid" value='<?php echo $userid; ?>'>
                        <input type="hidden" name="email" value='<?php echo $email; ?>'>
                        <input type="hidden" name="transref" value='<?php  echo $transref; ?>'>
                        <button type="submit" name="submit" class='btn btn-primary'>Checkout</button>
          </form>
             </div>
     </div>

</div>
<?php
  include_once('myporterfooter.php');
?>