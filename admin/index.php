


<?php include '../config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="../s1.css">
    <title>Login Form</title>
</head>
<body>
<h1> Autoline.pk|Admin Pannel </h1>
<a href="index.php">  Admin Pannel!</a>
<a href="categoryManagement.php"> Category Management!</a>
<a href="addProducts.php"> Add Products!</a>
<a href="viewProducts.php"> view Products!</a>
<a href="viewFeedBacks.php"> view Feedback!</a>
<a href="../logout.php"> Logout!</a>
<br>
<br>
<div style="background-color:Orange; width:40%; height:200px;float:left; padding:10px; margine:10px;">
<?php
$result = mysqli_query($con, "select count(*)As Total_Customer from users  WHERE usertype='customer'"); 
$row = mysqli_fetch_assoc($result); 
$cus = $row['Total_Customer'];
echo "<br> <h2>Total Customers : ".$cus."</h2>";
 
        ?> 


</div>
<div style="background-color:SlateBlue; width:40%; height:200px;float:left; padding:10px; margine:10px;">
<?php
$result1 = mysqli_query($con, "SELECT count(*)As Total_Income FROM Products "); 
$row1 = mysqli_fetch_assoc($result1); 
$dress = $row1['Total_Income'];
echo "<br> <h2>Total Products : ".$dress."</h2>";
 
        ?> 



</div>
<div style="background-color:Yellow; width:40%; height:200px;float:left; padding:10px; margine:10px;">
<?php
$result = mysqli_query($con, "SELECT count(*) As Total FROM `category`"); 
$row = mysqli_fetch_assoc($result); 
$Total = $row['Total'];
echo "<br> <h2>Total categories : ".$Total."</h2>";
 
        ?> 
		</div>


<div style="background-color:Tomato; float:left; width:40%; height:200px; padding: 10px; margine:10px;">
<?php
$result = mysqli_query($con, "SELECT sum(amount)As Total_Income FROM `payments`"); 
$row = mysqli_fetch_assoc($result); 
$income = $row['Total_Income'];
echo "<br> <h2>Total Income : ".$income."</h2>";
 
        ?> 
</div>


</div>
</body>
</html>