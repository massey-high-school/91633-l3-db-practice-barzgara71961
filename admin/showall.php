<?php

    $stock_sql="SELECT * FROM `L3_prac_stock` ORDER BY `L3_prac_stock`.`name` ASC";
    $stock_query=mysqli_query($dbconnect, $stock_sql);
    $stock_rs=mysqli_fetch_assoc($stock_query);

?>


    <h3>
        Edit / Deleten and Item
    </h3>

    <table class="results">
        
        <?php do {?>
        <tr class="results">
            <td class="results"><a href="../index.php?page=item&stockID=<?php $stock_rs['stockID']; ?>"><?php echo $stock_rs['name'];?></a></td>
            <td class="results"><b>$ <?php echo $stock_rs['price'];?></b></td>
            <td class="results"><a href="#">Edit</a></td>
            <td class="results"><a href="#">Delete</a></td>
        </tr>
    <?php
        }
    
        while ($stock_rs=mysqli_fetch_assoc($stock_query))
    ?>
    </table>