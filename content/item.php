<?php

$stock_sql="SELECT * FROM `L3_prac_stock` JOIN L3_prac_categories ON (L3_prac_stock.categoryID=L3_prac_categories.categoryID) WHERE L3_prac_stock.stockID=".$_REQUEST['stockID'];

$stock_query=mysqli_query($dbconnect, $stock_sql);
$stock_rs=mysqli_fetch_assoc($stock_query);

?>

<!-- item information displayed below-->

<h3>
    <?php echo $stock_rs['name']; ?>
    ($<?php echo $stock_rs['price'];?>)
</h3>

<div class="photo">
    <img src="images/<?php echo $stock_rs['photo'];?>"/>

</div>

<p><b></b><?php echo $stock_rs['topline']; ?><b></b></p>

<p><?php echo $stock_rs['description']; ?></p>