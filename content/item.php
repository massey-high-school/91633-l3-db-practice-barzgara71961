<?php

$stock_sql="SELECT * FROM `L3_prac_stock` JOIN L3_prac_categories ON (L3_prac_stock.categoryID=L3_prac_categories.categoryID) WHERE L3_prac_stock.categoryID=".$_REQUEST['stockID'];

$stock_query=mysqli_query($dbconnect, $stock_sql);
$stock_rs=mysqli_fetch_assoc($stock_query);

?>

<!-- item information displayed below-->

<h3>
    <?php echo $stock_rs['name']; ?>
</h3>

<div class="photo">

</div>

<p>Topline</p>

<p>Description</p>