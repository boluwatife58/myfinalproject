<?php
   include_once('myporterheader.php');



?>
<div class="container" style='min-height:500px'>

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
      <small>All Products</small>
    </h1>

     
    <!-- Content Row -->
    <div class="row">
     
      <!-- Content Column -->
      <div class="col-lg-12 mb-4">
      <div style='text-align:right'>
	  <a class='btn btn-info mb-4' href='products.php'>Add New Products</a>
	  
	  </div>
	   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Images</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Description</th>
	  <th scope="col">Product Price</th>
    <th scope="col">Product Type</th>
    <th scope="col">Seller Name</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        <?php
          
          // include class
        include_once('docs/members.php');

           // create instance of club class
        $obj= new Seller;

        // reference getClubs
        $product=$obj->getProducts();
               
          
          $counter= 1;
        foreach ($product as $key => $value) {
          $id = $value['product_id'];
        ?>
        <tr>
          <th scope='col'><?php  echo $counter++; ?></th>
          <td>
               <img src="uploads/<?php echo $value['seller_image'];?>" alt='image' style='width:45px;'>
           </td> 
          <td><?php echo $value['product_name'];?></td>
          <td><?php echo $value['product_description'];?></td>
          <td><?php echo $value['product_price'];?></td>
          <td><?php echo $value['product_type'];?></td>
          <td><?php echo $value['seller_name'];?></td>
          <td>
            <a href='editproduct.php?id=<?php echo $id; ?>' class='btn btn-primary btn-sm'>
              <i class='fa fa-edit'></i> Edit</a>
            <a href='deleteproduct.php?id=<?php echo $id; ?>' class='btn btn-danger btn-sm'>
              <i class='fa fa-trash'></i> Delete</a>  
          </td>
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