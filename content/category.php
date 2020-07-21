<?php

    if(!isset($_REQUEST['categoryID']))
    {
        header('Localtion:index.php');
    }

$stock_sql="SELECT stock.stockID, stock.name, stock.price, category.catName FROM stock JOIN category ON (stock.categoryID=categoryID) WHERE stock.categoryID=". $_REQUEST['categoryID']."ORDER BY stock.name ASC";
$stock_query=mysqli_query($dbconnect,$stock_sql);
$stock_rs=mysqli_fetch_assoc($stock_query);

?>

<h3>

    <?php
        echo$stock_rs['catName']
    ?>

</h3>

<table class="results">
    
<?php
            
do{
    
    ?>
    
    <tr class="results">
        
        <td class="results">
            <a href="index.php?page=item$stockID=<?php echo $stock_rs['stockID'];?>">
                <?php echo $stock_rs['name'];?>
            </a>
        
        </td>
    
        <td class="results">
        <b>$<?php echo $stock_rs['price'];?></b>
        </td>
    
    </tr>
    
    
    <?php
}

while ($stock_rs=mysqli_fetch_assoc($stock_query))
    
?>

</table>