<?php include '../config.php'; 
 $result = $con->query("SELECT * FROM products"); 


?>

<?php if($result->num_rows > 0){ ?> 
<link rel="stylesheet" href="../s1.css">
    <div class="gallery">
<h1> All Products!</h1>
<a href="index.php">Home</a>|
<a href="../logout.php"> Logout!</a>	
        <?php while($row = $result->fetch_assoc()){ ?> 
		<br>
		Product ID:<?php echo $row['productid']?>
		<br>
				Category:<?php echo $row['category']?>
				<br>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width=100px height=100px /> 
      <br>
	  Sub Category:<?php echo $row['subCategory']?>
	   <br>
	  Price:<?php echo $row['price']?>
	   <br>
	 
	   
	   <?php

//echo '<a href="tech.php?id=' . $row['shopid'] . '">Show Technicians</a>';

	   } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>