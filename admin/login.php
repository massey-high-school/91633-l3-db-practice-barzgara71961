<form action="admin.php?page=adminlogin" method="post">

<P>Username: <input name="username" /></P>
<p>Password: <input name="password" type="password"/></p>
    
<?php
    if (isset($_GET['error'])){
        echo"<span class=\"error\">Incorrect username / password</span>";
    }
?>  
    
<p><input type="submit" name="login" value="Log In" /></p>

</form>