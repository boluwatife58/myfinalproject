<?php
   include_once('myheader.php');
?>
  
         	
         		
         
        <div class='row'>
        	<div class='col-sm-12 head1'>
        		<p class='text-center'>shirts</p>
        		<?php
                  
         include_once('docs/members.php');

         // create object of marketplace class

          $obj = new Seller;
          $items= $obj->getPro();
           if (!empty($items)) {
         	foreach ($items as $key => $value) {
         		$images= $value['seller_image'];
         		$proname= $value['product_name'];
         		$proprice= $value['product_price'];
         		$prodesc= $value['product_description'];
         		$prdid= $value['product_id'];
         		// echo "<pre>";
         		 // print_r($items);
         		// echo "</pre>"; 
         ?>
        		
        		<div>
        		<img src="uploads/<?php echo $images ;?>" alt='images' style='width:100px'>
             	<br/>
             	<span><?php echo $proname; ?></span>
             	<br/>
             	<span><?php echo $proprice ;?></span>
             	<br/>
             	<span><?php echo $prodesc ;?></span>
             	<form action='insertsalesproduct.php' method='post'>
             		<input type="hidden" name="price" value='<?php echo $proprice; ?>'>
             		<input type="hidden" name="productid" value='<?php echo $proid; ?>'>
             		<button type='submit' name='submit' class='btn btn-primary'>Buy</button>
             	</form>	
        		</div>
             <?php		
         	}
         }
	?>

        	</div>
        </div>

<?php
    include_once('myfooter.php');
?>