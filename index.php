<!DOCTYPE HTML>

<?php
    
    include("config.php");
    
    // connect to datebase...
    $dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
    if(mysqli_connect_errno()) {
        echo "connection failed:".mysqli_connect_error();
        exit;
        
    }
    
?>
<html>

<?php include ("theme/topbit.php"); ?>

	<div class="main">

		<h1>Welcome to Chic Clothing</h1>

		<p>Please choose a category from the list above or <a href="#">login</a> to access the admin panel.</p>	

	</div> <!-- end main -->

<?php include ("theme/bottombit.php"); ?>
		
</html>