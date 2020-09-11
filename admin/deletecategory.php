<?php

    $delcatID = preg_replace('/[^0-9]/','',$_POST["delcat"]);
    
    $delcat_sql="SELECT * FROM `L3_prac_categories` WHERE categoryID=".$delcatID;
    $delcat_query=mysqli_query($dbconnect, $delcat_sql);
    $delcat_rs=mysqli_fetch_assoc($delcat_query);

    // CHECK if category has item in it 
    $check_sql="SELECT * FROM `L3_prac_stock` WHERE categoryID=$delcatID";
    $check_query=mysqli_query($dbconnect, $check_sql);
    $count=mysqli_num_rows($check_query);

    if ($count>0) { ?>
    <div class="warning"><p>Warning there are <?php echo $count; ?> items in the <?php echo $delcat_rs['catName']; ?> categoery. If you delete this category, those item will be removed from the database.</p> </div>

<?php 

}

?>
<p> 
<a href="admin.php?page=deletecategoryconfirm&categoryID=<?php echo $delcat_rs['categoryID']?>">Yes, delete it!</a> |
<a href="admin.php?page=adminpanel">No, go back</a>
    </p>