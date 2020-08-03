<?php

$name="";
$price=0;
$categoryID=1;
$topline="";
$description="";
$photo="noimage.png";
$NameErr=$PriceErr=$PhotoErr=$TopErr=$DesErr="";


if(!isset($_SESSION['admin']))
{
    header("Location:index.php");
    exit();
}

// define variables and set to empty values...
$valid=true;
$uploadOK=1;

?>

<form>
    <h1>Add Item</h1>
    
    <p>
        <b>Item Name:</b>
        <input type="text" name="name" value=""/>
    </p>
    
     <p>
        <b>Price: $</b>
        <input type="text" name="price" value=""/>
    </p>
    
     <p>
        <b>Category</b>
        <input type="text" name="category" value=""/>
    </p>
    
     <p>
        <b>Photo</b>
        <input type="text" name="photo" value=""/>
    </p>
    
     <p>
        <b>TopLine</b>
        <input type="text" name="topline" value=""/>
    </p>
    
    <p>
        <b>Description</b>
    </p>
    <p>
        <textarea type="text" name="description" cols="60" rows="7"></textarea>
    </p>

</form>