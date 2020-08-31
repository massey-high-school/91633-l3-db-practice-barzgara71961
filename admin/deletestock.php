<?php
    $stock_sql="SELECT * FROM `L3_prac_stock` WHERE L3_prac_stock.stockID=".$_GET['stockID'];
    $_REQUEST['stockID'];
    $stock_query=mysqli_query($dbconnect, $stock_sql);
    $stock_rs=mysqli_fetch_assoc($stock_query);

    // Remove image if required
    if ($stock_rs['photo'] != 'noimage.png')
        
    unlink (IMAGE_DIRECTORY. "/".$stock_rs['photo']);

    // Delete item 
    $delstock_sql="DELETE FROM L3_prac_stock WHERE stockID=".$_REQUEST['stockID'];
    $delstock_query=mysqli_query($dbconnect, $delstock_sql);

?>

<h1>DELETE SUCCESS</h1>

<p><a href="admin.php?page=adminpanel">Reture to admin panel</a></p>
