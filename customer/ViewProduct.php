<?php include '../config.php';?>

<?php
if(isset($_POST['checkout']))
{
	header('Location:http://localhost/autoline/customer/checkout.php');
}

$customerID=$_SESSION["userid"] ;
echo "<h1> Welcome : ".$customerID."</h1>";

 $productid=$_GET['id'];

$_SESSION["productid"] =$productid;
$productid=$_SESSION["productid"];

if(isset($_POST['done']))//add to cart
{
	
	$cusId = $customerID;
            $productid=$_POST['productid'];
			
 $result = $con->query("SELECT * FROM products where productid= '$productid'"); 

 if($result->num_rows > 0)
 {
	 
	$row = $result->fetch_assoc();
	
$price = $row['price'];
			
$qty=	$_POST['qty'];		
	$TotalPrice=$price*$qty;


                                              echo"<br> cusId ".$cusId." productid ".$productid." price ".$price." qty ".$qty." TotalPrice ".$TotalPrice;
	
			$status="confirmed";
			
		$q1="INSERT INTO `cart`(`customerID`, `productid`, `unitPrice`, `Quantity`, `TotalPrice`)VALUES ('$cusId','$productid','$price','$qty','$TotalPrice')";	
			$query = mysqli_query($con,$q1);
 	echo"thank you";
	
	header('Location:http://localhost/autoline/customer/index.php');
 }
	
	
	
	
	
	
}



$result = $con->query("SELECT * FROM products where productid= '$productid'"); 

 if($result->num_rows > 0)
 {
	$row = $result->fetch_assoc();
	
	
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    

    <title>View Product Information </title>

<link rel="stylesheet" href="../s1.css">
</head>
<body>
<h1> View Product Information</h1>
   <form method="POST" action="ViewProduct.php">
   <?php 
   
   $unitPrice=$row['price'];
	 $subCategory=$row['subCategory'];
	 $category=$row['category'];

   
   ?>
<table border=1>

<tr><td><a href="index.php">Home</a></td>
<td></td><td></td><td></td>
</tr>
<tr><th>Product NO</th><th>category</th><th>price</th><th>Choose Quantity</th></tr>
<tr><td><?php echo $productid;  ?></td><td><?php echo $category;  ?></td><td><?php echo $unitPrice;  ?></td><td> Quantity:
	   <select name ="qty" id="qty">  
  <option value="Select" >--Select--</option> 
  <option value="1">1</option>  
  <option value="2">2</option>  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>  
  <option value="6">6</option>  
  <option value="7">7</option>  
  <option value="8">8</option>  
  <option value="9">9</option>  
  <option value="10">10</option>
</select>
<input type="hidden" id="productid" name="productid" value="<?php echo $row['productid']?>">
</td></tr>
<tr><td></td><td><button type="submit" name="done" >Add to Cart </button></td><td><button type="submit" name="checkout"> check out </button> </td><td></td></tr>

</table>

 	 
<?php		
 }

?>

                    
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>