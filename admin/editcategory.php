<?php

//Edit Category
$oldcat = preg_replace('/[^a-zA-Z0-9 ]/','', $_POST["oldcat"]);
$newcat = preg_replace('/[^a-zA-Z0-9 ]/','', $_POST["newcat"]);

$editcat_sql="UPDATE `barzgara`.`L3_prac_categories` SET `catName`='$newcat' WHERE `catName`='$oldcat'";
$editcat_query=mysqli_query($dbconnect,$editcat_sql);

    header('Location:admin.php?page=editcatsucces');
?>