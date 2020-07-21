
<head>
	<meta name="description" content="Chic Clothing">
	<meta name="keywords" content="Chic Clothing">
	<meta name="author" content="Miss Gottschalk (from Phil Adams' videos) and more than a little help from Dave">
	<meta charset="UTF-8">
	<title>Chic Clothing</title>
	<link rel="stylesheet" href="theme/chic.css" title="style1" />
</head>
	
	<body>
<div class="content">

	<div class="heading">
		<h1 class="white">Chic Clothing</h1>
	</div> <!-- end heading -->

	<div class="navigation">
		
		<?php
        $cat_sql="SELECT * FROM `L3_prac_categories`";
        $cat_query=mysqli_query($dbconnect,$cat_sql);
        $cat_rs=mysqli_fetch_assoc($cat_query);
        
        do{?>
        
        <a class="nav" href="index.php?page=category&categoryID=<?php echo $cat_rs['categoryID'];?>">
            
            <?php echo $cat_rs['catName'];?></a>|
        <?php
            
        }
        
        while($cat_rs=mysqli_fetch_assoc($cat_query))
        
        ?>
        
        | 
					
		<a class="nav" href="admin/admin.php">Admin</a>
		
	</div>	<!-- end navigation -->