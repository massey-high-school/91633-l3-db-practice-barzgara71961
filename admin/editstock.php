<?php 

$name="";
$price=0;
$categoryID=1;
$topline="";
$description="";
$photo="noimage.png";
$NameErr=$PriceErr=$PhotoErr=$TopErr=$DesErr="";

// sql to populate our 'edit' form...
$stockID=preg_replace('/[^0-9.]/','',$_REQUEST['stockID']);
$editstock_sql="SELECT * FROM `L3_prac_stock` WHERE L3_prac_stock.stockID=".$stockID;
$editstock_query=mysqli_query($dbconnect, $editstock_sql);
$editstock_rs=mysqli_fetch_assoc($editstock_query);

$name=$editstock_rs['name'];
$price=$editstock_rs['price'];
$categoryID=$editstock_rs['categoryID'];
$topline=$editstock_rs['topline'];
$description=$editstock_rs['description'];
$photo=$editstock_rs['photo'];

// define variables and set to empty values...
$valid=true;
$uploadOK=1;

// Code below excutes when the form is submitted...
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    
    // sanitise all variables
    $name = test_input(mysqli_real_escape_string($dbconnect,$_POST["name"]));
    $price = test_input($_POST["price"]);
    $categoryID = preg_replace('/[^0-9.]/','',$_POST["categoryID"]);
    $topline = test_input(mysqli_real_escape_string($dbconnect,$_POST["topline"]));
    $description = test_input(mysqli_real_escape_string($dbconnect,$_POST["description"]));
    
    // Error checking...
    if (empty($name)){
        $NameErr = "item name is required";
        $valid=false;
    }
    
    $price=preg_replace('/[^0-9.]-/','',$_POST['price']);
    if ($price<=0){
        $PriceErr = "Enter a number greater then 0";
        $valid=false;
    }
    
    if (empty($topline)){
        $TopErr = "Please provide a byline";
        $valid=false;
    }
    
    if (empty($description)){
        $DescriptionErr = "Please provide a description";
        $valid=false;
    }
    
    // Check image
    if ($_FILES['fileToUpload']['name']!=""){
        
    // shifts images from temporary directory to target directory
        
    //use unique-id so each uploaded direcotry to target diectory
        $target_file = uniqid()."-".basename($_FILES["fileToUpload"]['name']);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        
        
    // Allow .jng, .png or gif only
        if($imageFileType !="jpg" && $imageFileType != "png" && $imageFileType !="gif"){
            $PhotoErr= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOK=0;
            $valid=false;
        }
        
        // check file size
        if ($_FILES["fileToUpload"]["size"] > 500000){
            $PhotoErr="Sorry, yor file is too large.";
            $uploadOK=0;
            $valid=false;
        }
    }
    
    // if everything is OK - show 'success massage and update database
    if($valid){
        // header('Location: admin.php?page=editstock_success');
    
    // replace image and delete 'old' image if necessary
    
    if ($_FILES['fileToUpload']['name']!="")
    {
        $target_file = uniqid()."-".basename($_FILES["fileToUpload"]['name']);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $changephoto=",photo=\"$target_file\"";
        
        // Removes old photo file...
        if ($editstock_rs['photo']!='noimage.png' and $editstock_rs['photo']!='')
        {
            unlink(IMAGE_DIRECTORY."/".$editstock_rs['photo']!='');
        }
        
        $fileuploaded=1;
    }
        
    else {
        $fileuploaded=0;
        $changeephoto='';
    }
        
    // update the datebase Column_Name=New_Value, Column_Name=new_Value
        
        $editstock_sql="UPDATE L3_prac_stock SET
        name='$name',
        categoryID='$categoryID',
        price='$price',
        photo='$photo',
        topline='$topline',
        description='$description'
        $changephoto,
        WHERE stockID=$stockID";


        // Code below runs query and data into datebase
        $editstock_query=mysqli_query($dbconnect,$addstock_sql);
        
        if ($uploadOK==1){
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],IMAGE_DIRECTORY.'/'.$target_file);
        }
        
    }
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=editstock&stockID=$stockID");?>" enctype="multipart/form-data">
    <h1>Edit Item</h1>
    
    <p>
        <b>Item Name:</b>
        <input type="text" name="name" value="<?php echo $name;?>"/>
        &nbsp;&nbsp;<span class="error"><?php echo $NameErr;?></span>
    </p>
    
     <p>
        <b>Price: $</b>
        <input type="text" name="price" value="<?php echo $price;?>" size="2"/>
         &nbsp;&nbsp;<span class="error"><?php echo $PriceErr;?></span>
    </p>
    
     <p>
        <b>Category</b>
        <select name="categoryID">
         
            <?php
            
            $cat_sql="SELECT * FROM `L3_prac_categories`";
            $cat_query=mysqli_query($dbconnect,$cat_sql);
            
            do{
                
                if ($cat_rs['categoryID']==$categoryID){
                    echo '<option value="'.$cat_rs['categoryID'].'"" selected';
                echo ">".$cat_rs['catName']."</option>";
                }
                else{
                echo '<option value="'.$cat_rs['categoryID'].'"';
                echo">".$cat_rs['catName']."</option>";
                }
            }
            
            while ($cat_rs=mysqli_fetch_assoc($cat_query))
            
            ?>
            
         </select>
    </p>
    
     <p>
        <b>Photo</b>
    </p>
         <p>
            <?php 
            // show image in database
                echo "<img src=".IMAGE_DIRECTORY."/".$editstock_rs['photo'].">";
            ?>
        </p>
    <p>
         Optionally Replace Photo Above:
        <input type="file" name="fileToUpload" value=""/>&nbsp;&nbsp;<span class="error"><?php echo $PhotoErr;?></span>
    </p>
    
     <p>
        <b>TopLine</b>
        <input type="text" name="topline" value="<?php echo $topline;?>"/>
         &nbsp;&nbsp;<span class="error"><?php echo $TopErr;?></span>
    </p>
    
    <p>
        <b>Description</b>&nbsp;&nbsp;<span class="error"><?php echo $DesErr;?></span>
    </p>
    <p>
        <textarea type="text" name="description" cols="60" rows="7"><?php echo $description;?></textarea>
    </p>
    <input type="submit" name="submit" value="Edit item"/>

</form>