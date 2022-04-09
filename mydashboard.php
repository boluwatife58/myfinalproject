<?php
   include_once('myporterheader.php');

?>

     
     
     <div class='row justify-content-start'>
     	<div class='col'>
     		 <?php
                 echo "Welcome! ".$_SESSION['sellername'];
             ?>
     	</div>
     </div>

     <div class='row'>
     	<div class='col' style=''>
     		
     		<a class='btn btn-primary mb-4' href='products.php'>Add products</a>
     	</div>
     </div>

      

       <div class="row mb-4">
          <div class="col-sm-6  col-md-6  mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-users" style='font-size:24px'></i>
                </div>
                <div class="mr-5" style='font-weight:bold;'>Orders</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="listorders.php" style='text-decoration: none;color:#fff;'>
                <span class="float-left" >View Orders</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-sm-6  col-md-6  mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-list"></i>
                </div>
                <div class="mr-5" style='font-weight:bold;'>Payments</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="" style='text-decoration: none;'>
                <span class="float-left"  >View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-sm-6   col-md-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa fa-comment"></i>
                </div>
                <div class="mr-5" style='font-weight:bold;'> Information</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="" style='text-decoration: none;'>
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-sm-6   col-md-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div>
                  <i class="fa  fa-ban"></i>
                </div>
                <div class="mr-5" style='font-weight:bold;'>Failed Transactions!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="" style='text-decoration: none;'>
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        



<?php
    include_once('myporterfooter.php');
?>