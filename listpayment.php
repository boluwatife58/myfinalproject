<?php
   include_once('myporterheader.php');



?>
<div class="container" style='min-height:500px'>

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small>All Orders</small>
    </h1>

     
    <!-- Content Row -->
    <div class="row">
     
      <!-- Content Column -->
      <div class="col-lg-12 mb-4">
      <div style='text-align:right'>
	  
	  
	  </div>
	   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Images</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Quantity</th>
	  <th scope="col">Customer Name</th>
    <th scope="col">Customer Address</th>
    <th scope="col">Status</th>
  
	  
    </tr>
  </thead>
  <tbody>
        <?php
          
          // include class
        include_once('docs/userclass.php');

           // create instance of club class
        $obj= new User;

        // reference getClubs
        $orders=$obj->getOrderpayment();
               
          
          $counter= 1;
        foreach ($orders as $key => $value) {
          $id = $value['customer_order_id'];
        ?>
        <tr>
          <th scope='col'><?php  echo $counter++; ?></th>
          <td>
               <img src="uploads/<?php echo $value['seller_image'];?>" alt='image' style='width:45px;'>
           </td> 
          <td><?php echo $value['product_name'];?></td>
          <td><?php echo $value['product_price'];?></td>
          <td><?php echo $value['quantity'];?></td>
          <td><?php echo $value['customer_name'];?></td>
          <td><?php echo $value['customer_address'];?></td>
          <td><?php echo $value['status'];?></td>
        </tr>
        <?php
          }
        ?>
  </tbody>
</table>

      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php
   include_once('myporterfooter.php');
?>