       <?php
         include_once('myheader2.php');
       ?>
        <!--Header -->
        <!-- <div class='row' id='header'>
          <div class='col-sm-12 col  text-center' id='headersub'>
            <h4 >We give you the best shopping experience<b/> of a lifetime </h4>
          </div>
        </div> -->

       	  <div class='row'>
       	  	<div class='col-12'>
               <h2>PRODUCTS</h2>
                <P>BAGS</P>
                <P>CLOTHS</P>
                <P>SHOES</P>  
            </div>
          </div>
             
             <!-- shoes category-->
              <div class='row'>
            <div class='col head1'>
              <p class='text-center'>Shoes</p>
            </div>
       	  	</div>

           
                 <?php
         include_once('docs/members.php');
           
          
         // create object of marketplace class

         $obj = new Seller;
         $items= $obj->getProdhome('3');

         if (!empty($items)) {?>
<div class="row "> 
  <a href='viewallproducts.php?id=3' style='color:#000; text-decoration: none;'>View All</a>
            <?php foreach ($items as $key => $value) {
                 $id = $value['product_id'];
             ?>
                  <div class="col-sm-12   col-md-3 mt-2 mb-3 ">
        <div class="card" style="width: 16rem; ">
           <?php  $image= $value['seller_image'];
                            echo "<img src='uploads/$image' alt='$image' style='width: !6rem; height:12em; class='img-fluid' ' >"; ?>
          <div class="card-body  text-center" style="background-color:; min-height:7em; font-weight: bold;">
           <?php 
                        $prdname= $value['product_name'];
                        
                         $prdprice= $value['product_price'];
                        $prdid= $value['product_id'];
                    ?>
                <span><?php echo $prdname; ?></span>
                <br/>
                <span><?php echo $prdprice ;?></span>
               
                    <button type='submit' name='submit' class='btn btn-primary' id='btbuy' style='width:100%; border-radius: 40px;'><a href='alldetails.php?id=<?php echo $id; ?>' style='color:#fff;text-decoration: none;'>View More</a></button>
              
          </div>
        </div>
      </div>
                


         <?php      
           }
       ?></div>
         <?php }

    ?>
          <!-- shoes header-->
         <div class='container-fluid'> 
            
          </div>
        
  
       	  	
          <!-- head2-->
          <div class='row'>
            <div class='col-12 head2'>
               <p class='text-center'>Cloths</p>

            </div>
          </div>
           
            <!-- second picture div-->
             <?php
         include_once('docs/members.php');
           
          
         // create object of marketplace class

         $obj = new Seller;
         $items= $obj->getProdhome('2');

         if (!empty($items)) {?>
<div class="row "> 
 <a href='viewallproducts.php?id=2' style='color:#000; text-decoration: none;'>View All</a>
            <?php foreach ($items as $key => $value) {
                  $id = $value['product_id'];
             ?>
                  <div class="col-sm-12   col-md-3 mt-2 mb-3 ">

        <div class="card" style="width: 16rem; ">
           <?php  $image= $value['seller_image'];
                            echo "<img src='uploads/$image' alt='$image' style='width: !6rem; height:12em; class='img-fluid' ' >"; ?>
          <div class="card-body  text-center" style="background-color:; min-height:7em; font-weight: bold;">
           <?php 
                        $prdname= $value['product_name'];
                        
                         $prdprice= $value['product_price'];
                        $prdid= $value['product_id'];
                    ?>
                <span><?php echo $prdname; ?></span>
                <br/>
                <span><?php echo $prdprice ;?></span>
               
                    <button type='submit' name='submit' class='btn btn-primary' id='btbuy' style='width:100%; border-radius: 40px;'><a href='alldetails.php?id=<?php echo $id; ?>' style='color:#fff;text-decoration: none;'>View More</a></button>
              
          </div>
        </div>
      </div>
                

         <?php      
           }
       ?></div>
         <?php }

    ?>
            <!-- close second picture div-->

              
           
          <!-- bags category-->
          <div class='row'>
            <div class='col-12 head3'>
               <p class='text-center'>Bags</p>
            </div>
          </div>


                <?php
         include_once('docs/members.php');
           
          
         // create object of marketplace class

         $obj = new Seller;
         $items= $obj->getProdhome('1');

         if (!empty($items)) {?>
<div class="row "> 
  <a href='viewallproducts.php?id=1' style='color:#000; text-decoration: none;'>View All</a>
            <?php foreach ($items as $key => $value) { 
                    $id = $value['product_id'];
              ?>

                  <div class="col-sm-12   col-md-3 mt-2 mb-3 ">
        <div class="card" style="width: 16rem; ">
           <?php  $image= $value['seller_image'];
                            echo "<img src='uploads/$image' alt='$image' style='width: !6rem; height:12em; class='img-fluid' ' >"; ?>
          <div class="card-body  text-center" style="background-color:; min-height:7em; font-weight: bold;">
           <?php 
                        $prdname= $value['product_name'];
                        
                         $prdprice= $value['product_price'];
                        $prdid= $value['product_id'];
                    ?>
                <span><?php echo $prdname; ?></span>
                <br/>
                <span><?php echo $prdprice ;?></span>
               
                    <button type='submit' name='submit' class='btn btn-primary' id='btbuy' style='width:100%; border-radius: 40px;'><a href='alldetails.php?id=<?php echo $id; ?>' style='color:#fff;text-decoration: none;'>View More</a></button>
              
          </div>
        </div>
      </div>
                

         <?php      
           }
       ?></div>
         <?php }

    ?>
      <!-- bags category-->

           
        
        <?php
        include_once('myfooter.php');
        ?>

         