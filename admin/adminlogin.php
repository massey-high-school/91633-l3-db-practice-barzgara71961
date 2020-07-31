<?php

if(isset($_REQUEST['login'])){
    
    $login_sql="SELECT * FROM `L3_prac_users` WHERE username='".$_POST['username']."'AND password='".sha1($_POST['password'])."'";
    
    $login_quert=mysqli_query($dbconnect, $login_sql);
    
    if(mysqli_num_rows($login_query)>0)
    {
        $login_rs=mysqli_fetch_assoc($login_query);
        $_SESSION['admin']=$login_rs['usename'];    
    }
    
    
    else {
        unset($_SESSION);
        header("Location: admin.php?page=login&error=login");
        
    }
    
    
    
}

?>