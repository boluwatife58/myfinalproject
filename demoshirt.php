 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    
       




                    <div class='container'>
                         <?php
         include_once('docs/members.php');

         // create object of marketplace class

         $obj = new Seller;
         $items= $obj->getPro();

         if (!empty($items)) {?>
                      <div class="row mb-5 mt-4">
                <?php foreach ($items as $key => $value) { ?>
                  <div class="col-sm-12   col-md-4">
        <div class="card" style="width: 10rem; ">
           <?php  $image= $value['seller_image'];
                            echo "<img src='uploads/$image' alt='$image' style='width: 10rem'>"; ?>
          <div class="card-body text-light" style="background-color: black; min-height:7em;">
           <?php 
                        $prdname= $value['product_name'];
                        $prdprice= $value['product_price'];
                        $prdid= $value['product_id'];
                    ?>
                <span><?php echo $prdname; ?></span>
                <br/>
                <span><?php echo $prdprice ;?></span>
                <form action='insertsalesproduct.php' method='post'>
                    <input type="hidden" name="price" value='<?php echo $prdprice; ?>'>
                    <input type="hidden" name="productid" value='<?php echo $prdid; ?>'>
                    <input type="hidden" name="userid" value='1'>
                    <input type="hidden" name="trans_action" value='insert'>
                    <button type='submit' name='submit' class='btn btn-primary' id='btbuy' style='width:100%; border-radius: 40px;'>Buy</button>
                </form>
          </div>
        </div>
      </div>

     <?php      
           }
       ?></div>
        <?php }

    ?>
                 </div>  

</body>
</html>








   <div>
                    <?php
         include_once('docs/members.php');

         // create object of marketplace class

         $obj = new Seller;
         $items= $obj->getPro();

         if (!empty($items)) {?>
<div class="row"> 
            <?php foreach ($items as $key => $value) { ?>
                <div class="col-md-4">
                <div class="card">
                        <div class='card-image-header' class="card-img-top img-fluid">
                           <?php  $image= $value['seller_image'];
                            echo "<img src='uploads/$image' alt='$image' style='width:100px'>"; ?>
                        </div>
                    <div class='card-body'>
                    <?php 
                        $prdname= $value['product_name'];
                        $prdprice= $value['product_price'];
                        $prdid= $value['product_id'];
                    ?>
                <span><?php echo $prdname; ?></span>
                <br/>
                <span><?php echo $prdprice ;?></span>
                <form action='insertsalesproduct.php' method='post'>
                    <input type="hidden" name="price" value='<?php echo $prdprice; ?>'>
                    <input type="hidden" name="productid" value='<?php echo $prdid; ?>'>
                    <input type="hidden" name="userid" value='1'>
                    <input type="hidden" name="trans_action" value='insert'>
                    <button type='submit' name='submit' class='btn btn-primary' id='btbuy'>Buy</button>
                </form>
        
                    </div>
                </div>

         </div>
                

         <?php      
           }
       ?></div>
         <?php }

    ?>
                 </div> -->