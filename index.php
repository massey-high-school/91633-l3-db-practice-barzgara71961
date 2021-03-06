<!DOCTYPE HTML>

<?php
    
    session_start();
    include("config.php");
    include("function.php");
    
    // connect to datebase...
    $dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
    if(mysqli_connect_errno()) {
        echo "connection failed:".mysqli_connect_error();
        exit;
        
    }
    
?>
<html>

<?php 
    include ("theme/heading.php");
    include ("content/headers.html");
    
    ?>

<div class="main">

    <?php
        
    if(!isset($_REQUEST['page'])){
        include($page="content/home.php");
    }
        
    else{
        // prevents user from navigating through file system
        $page=preg_replace('/[^0-9a-zA-Z]-/','',$_REQUEST['page']);
        include("content/$page.php");
    }

    ?>


</div> <!-- end main -->

<?php include ("theme/bottombit.php"); ?>
    
    

</html>
