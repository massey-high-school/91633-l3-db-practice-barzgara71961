<!DOCTYPE HTML>

<?php
    
    session_start();
    include("../config.php");
    include("../function.php");
    
    // connect to datebase...
    $dbconnect=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
    if(mysqli_connect_errno()) {
        echo "connection failed:".mysqli_connect_error();
        exit;
        
    }
    
?>
<html>
    
<head>
    <link rel="stylesheet" href="../theme/chic.css" title="style1"/>
    
</head>
    

<?php 
    
     //include ("../theme/heading.php"); 
    include ("adminheading.php"); 
?>

<div class="main">

    <?php
        
    if(!isset($_REQUEST['page'])){
        $page="adminlogin";
    }
        
    else{
        // prevents user from navigating through file system
        $page=preg_replace('/[^0-9a-zA-Z]-/','',$_REQUEST['page']);
        
    }
        // offer logon if not logged in
    if ($page=="logout" or $page=="adminlogin" or $page=="login")
        include("$page.php");
        
    else{
        if(!isset($_SESSION['admin']))
        {
            header('Location: admin.php?page=login');
            die("YOu have not logged in");
        }
        else 
            include("$page.php");
        
    }
    ?>


</div> <!-- end main -->

<?php include ("../theme/bottombit.php"); ?>

</html>
