<?php

$delimage_sql="SELECT * FROM `L3_prac_stock` WHERE categoryID=".$_REQUEST['categoryID'];
$delimage_query=mysqli_query($dbconnect, $delimage_sql);
$delimage_rs=mysqli_fetch_assoc($delimage_query);

// remove unwanted images
if ($count>0)
{
    
    do{
        if ($delimage_rs['photo']!='noimage.png' and $delimage_rs['photo']!='')
            /* delete image */
            unlink(IMAGE_DIRECTORY."/".$delimage_rs['photo']);
    }
    
    while ($delimage_rs=mysqli_fetch_assoc($delimage_query));
    
    // delete unwanted items 
    $delcat_sql="DELETE FROM `L3_prac_stock` WHERE categoryID=".$_REQUEST['categoryID'];
    $delcat_query=mysqli_query($dbconnect, $delcat_sql);
    
}

// delete unwanted category 
 $delcat_sql="DELETE from `L3_prac_categories` WHERE categoryID=".$_REQUEST['categoryID'];
$delcat_query=mysqli_query($dbconnect, $delcat_sql);

 header('Location:admin.php?page=delcatsucces');
?>