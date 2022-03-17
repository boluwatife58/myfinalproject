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

     <div class='row justify-content-end'>
     	<div class='col'>
     		
     		<a class='btn btn-primary mb-4' href='products.php'>Add products</a>
     	</div>
     </div>



<?php
    include_once('myporterfooter.php');
?>