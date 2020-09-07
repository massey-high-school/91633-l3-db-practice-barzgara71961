
<h3>Categories</h3>

    <form action="admin.php?page=addcategory" method="post">
        <input name="catName" value=""/>
        <input type="submit" value="Add categoy"/>
    </form>

    <br />

    <form action="admin.php?page=editcategory" method="post">
        <select name="oldcat">
            
            <option value="">
                choose...
            </option>
            
            <?php 
                 $cat_sql="SELECT * FROM `L3_prac_categories`";
                $cat_query=mysqli_query($dbconnect, $cat_sql);
                $cat_rs=mysqli_fetch_assoc($cat_query);
            
                do{
                // value sent to query that edits the category
                echo "<option value='";
                echo $cat_rs['catName'];
                echo "'>";
                    
                // what the user sees in the drop down menu
                echo $cat_rs['catName'];
                echo "</option>";
                }
            
                while($cat_rs=mysqli_fetch_assoc($cat_query))
            ?>
        
        </select>
        &nbsp; &nbsp; Change to... <input name="newcat" value=""/>
        <input type="submit" value="Update Category"/>
    </form>


<p>
    <a href="admin.php?page=editcategory">Edit a Cateegory</a><br />
    <a href="admin.php?page=deletecategory">Delete a Cateegory</a><br />
</p>

<h3>Items</h3>

<p>
    <a href="admin.php?page=addstock">Add an Item</a><br />
    <a href="admin.php?page=showall">Edit / Delete an Item</a><br />
</p>

<p>
    <a href="admin.php?page=logout">logout</a><br />
</p>