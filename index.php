<?php include 'config.php';?>
<?php
//session_start();

 $userid = "";
$password = "";
if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['userid']))
	{
        if(!empty($_POST['password']))
	    {
			//"userType"
            $userid = $_POST['userid'];
            $password = $_POST['password'];
   
   
   
				
         $qry = "Select * from users where  userid= '$userid' and password='$password'";

            $results = mysqli_query($con, $qry);
            if ($results->num_rows> 0) //username and password is corract
			{
				$usertype="";
				$row = $results->fetch_assoc();//getting the single row only
				
					$usertype=$row['usertype'];//fetching the usertype
				
					$_SESSION['userid'] = $userid;//session
					if($usertype=="Admin")
					{
					session_start();
					header('Location:http://localhost/autoline/admin/index.php');
					}
					else if($usertype=="Customer")
					{
						session_start();
					header('Location:http://localhost/autoline/customer/index.php');
					}
					
            }
   
   			
			else 
			{
                echo "Invalid username or password.";
            }
   
        }
		else 
		{
           echo "Password field is empty.";
        }
    } 
	else 
	{
        echo "username field is empty";
    }
	
	
}
}
else if(isset($_POST['btnviewAll']))
{
	$result = $con->query("SELECT * FROM products"); 
}
else if(isset($_POST['btnSearch']))
{
	$title = $_POST['title'];
	$subCategory=$_POST['subCategory'];
	$category=$_POST['category'];
//dresstype,category //,search,	
$result = $con->query("SELECT * FROM products where subCategory='$subCategory' or category='$category' or title='$title' "); 
}
else
{

$result = $con->query("SELECT * FROM products"); 	
	
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="s1.css">
    <title>Autoline.pk</title>
</head>
<body>
<h1> Wellcome Autoline.pk</h1>
   <form method="POST" action="index.php">
<table>

<tr><td><a href="AdminRegistrationForm.php"> Register Now as Admin !</a></td>
<td><a href="CustomerRegistration.php"> Register Now as Customer!</a></td></tr>

<tr><td>Enter User Name :</td><td><input type="text" name="userid"  id="username"></td></tr>
<tr><td>Enter User password : </td><td><input type="password" name="password"  id="password"></td></tr>
<tr><td></td><td><button type="submit" name="done">Submit</button></td></tr>

</table>
<br>
<hr>

<table>
	<tr>
	<td>
<select name="category">
    <option disabled selected>-- Select Category--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT `category` FROM `category`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['category'] ."'>" .$data['category'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
  </td>
  <td>
	<select id="subCategory" name="subCategory">
  <option disabled selected>-- Select sub Category--</option>
    <?php
	//mysqli_query($con,$q1);
        include "../config.php";  // Using database connection file here
        $records = mysqli_query($con, "SELECT `subcategory` FROM `category`");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['subcategory'] ."'>" .$data['subcategory'] ."</option>";  // displaying data in option menu
        }	
    ?></select>
</td>

  <td><input type="text" name="title"></td>
  <td> <button type="submit" name="btnSearch"> search </button>  </td>
  <td> <button type="submit" name="btnviewAll"> view All</button>  </td>
  </tr>
  </table>


  <?php 
  
  if($result->num_rows > 0)
 { 

  
  while($row = $result->fetch_assoc())
		{ ?> 
	<div style="float:left; padding:10px; margine:10px; display: inline-block; border: 1px solid blue;">
		<br>
		Dress ID:<?php echo $row['productid']?>
		<br>
				Category:<?php echo $row['category']?>
				<br>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width=100px height=100px /> 
      <br>
	  Sub Category:<?php echo $row['subCategory']?>
	   <br>
	  Price:<?php echo $row['price']?>
	   <br>
	 
	  
 </div>

<?php 

//echo '<br><a href="ViewDress.php?id=' . $row['dressid'].'">Add to Cart Now !</a>';
	
//$con->close();	
} 
	 }else
	 { 
    echo "<br>Record not found <br>";
 }  
                    
?>		
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>