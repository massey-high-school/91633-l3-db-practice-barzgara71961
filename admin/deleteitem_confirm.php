<h1>Delete an Item - Confrim</h1>

<?php
/* need to show item name in confirmation massage */
$delstock_sql="SELECT * FROM `L3_prac_stock` WHERE `stockID`=".$_REQUEST['stockID'];
$delstock_query=mysqli_query($dbconnect,$delstock_sql);
$delstock_rs=mysqli_fetch_assoc($delstock_query);

?>

<p>Do you really want to delete <?php echo $delstock_rs['name']; ?> from the database?</p>

<p>
    <a href="admin.php?page=deletestock&sockID=<?php echo $_REQUEST['stockID']?>">Yes, Delete it!</a>
    <a href="admin.php?page=adminpanel">No, take me back</a>
</p>