<?php include '../config.php'; 

//session_start();
$customerID="";
$customerID=$_SESSION["userid"] ;
echo "<h1> Welcome : ".$customerID."</h1>";


?>



<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="../s1.css">
    <title> Order </title>
</head>
<body>
<h1> Display Customer Orders</h1>
<br>
<br>
<a href="index.php">  Customer Pannel!</a>


<a href="../logout.php"> Logout!</a>
<div >

                <form method="POST" action="displayOrder.php">
				<br>
<br> 
<br>
<table border=1>
<tr><th>ID</th><th>customerID</th><th>product id</th><th>unitPrice</th><th>Quantity</th><th>TotalPrice</th></tr>
<?php
// Get image data from database 
$result = $con->query("SELECT * FROM `orders` WHERE cusId='$customerID'"); 
 if($result->num_rows > 0)
 { 
 while($row = $result->fetch_assoc()){
	 //`cartID`, `customerID`, `dressid`, `unitPrice`, `Quantity`, `TotalPrice`
	 
	echo"<tr><td>".$row['orderid']."</td><td>".$row['cusId']."</td><td>".$row['productid']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['total']."</td></tr>";
	     
 }
 }
 else{
	 
	 
	  echo "No orders are found!";
 }
 
 
 //////////////////////////
 $result = mysqli_query($con, 'SELECT SUM(`unitPrice`) AS value_sum FROM cart'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "<br> <h2>Total Amount : ".$sum."</h2>";
 ?>
<br>
                    
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>