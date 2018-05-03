<?php
session_start();
if(!isset($_SESSION['customerEmail'])){
  header("Location: CustomerLoginPage.php");
}
?>
<?php include 'top1.html';?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    
    <ul class="navbar-nav">
        
		<li class="nav-item mx-2">
			<?php			
				if(isset($_POST['correctEmail'])){
					$email = $_POST['correctEmail'];                    
					echo "<form method='post' action='CustomerViewOrdersPage.php'>";					
					echo "<input type ='hidden' name = 'email' value = ".$email.">";
					echo "<button class='btn btn-primary' type='submit'> View Orders </button>";
					echo "</form>";
				}
			?> 
			
		</li>
		
		<li class="nav-item mx-2">
			<?php
				if(isset($_POST['correctEmail'])){
					$email = $_POST['correctEmail'];                    
					echo "<form method='post' action='CustomerSearchPage.php'>";					
					echo "<input type ='hidden' name = 'email' value = ".$email.">";
					echo "<button class='btn btn-primary' type='submit'> Search Books </button>";
					echo "</form>";
				}
		    ?>
			
		</li>
		
		<li class="nav-item mx-2">
			<a href="logOut.php"> <button class='btn btn-primary'> Log Off </button> </a>
		</li>
    
	</ul>
</nav>
<br>

<div class="container">

<?php
//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

if(isset($_POST['email'])){

	$emailIn = $_POST['email'];
	$queryEmail = mysqli_query($db, "SELECT * FROM customer WHERE Customer_Email='$emailIn'");
	$queryInfor = mysqli_query($db, "SELECT Lname, Fname, Customer_Email, Phone, Address FROM customer WHERE Customer_Email='$emailIn'");
	$row = mysqli_fetch_assoc($queryEmail);
	$temEmail = $row["Customer_Email"];

	if($temEmail == $emailIn){
		echo "<br><center><h2> Order Review </h2></center><br>";

		echo "<div style = 'margin: 0 auto; padding: 15pt; width: 450pt; border-style:solid; border-color:LightGray; border-width:4px;'>\n";
		echo "<form id='orderConfirm' method='post' action='orderReview.php' onsubmit = 'return plcaeOrder()'>";
		$row = mysqli_fetch_assoc($queryInfor);
		echo "<span style='font-weight: bold'>Customer Name: </span>".$row['Fname'].", ".$row['Lname'];
		echo "<br><br><span style='font-weight: bold'>Email: </span>".$row['Customer_Email'];
		echo "<br><br><span style='font-weight: bold'>Shipping Address: </span>".$row['Address'];
		echo "<br><br><span style='font-weight: bold'>Phone Number: </span>".$row['Phone'];
		$fname = $row['Fname'];
		$lname = $row['Lname'];
		$address = $row['Address'];
		$phone = $row['Phone'];
		
		echo "<input type ='hidden' name = 'customerFName' value = ".$fname.">";
		echo "<input type ='hidden' name = 'customerLName' value = ".$lname.">";
		echo "<input type ='hidden' name = 'customerAddress' value = ' ".$address." '>";
		echo "<input type ='hidden' name = 'customerPhone' value = ".$phone.">";

		
		echo "<br><br><center><h5 style='font-weight: bold'>Order Price Summary </h5></center><br>";

		echo "<table border='1'>";
		echo "<tr><th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> Delivery Option </th> <th style ='padding: 15px; text-align: center'> Book Price </th> <th style ='padding: 15px; text-align: center'> Shipping Price </th> </tr>";

		$bookPriceTotal = 0;
		$shippingPriceTotal = 0;
		$customerEmail = $_POST['email'];
		echo "<input type ='hidden' name = 'customerEmail' value = ".$customerEmail.">";

		foreach($_POST['delivery'] as $priceInfo){	
			$priceInfoArr = explode(",", $priceInfo);
			$bookISBN = $priceInfoArr[0];	
			$bookDeliveryPrice = $priceInfoArr[1];
			$bookPrice = $priceInfoArr[2];
			echo "<input type ='hidden' name = 'bookISBNArr[]' value = ".$bookISBN.">";
			
			$queryBookTitle = mysqli_query($db,"SELECT Book_title FROM book WHERE ISBN = '$bookISBN'") or die("could not work");
			$bookTitle = mysqli_fetch_assoc($queryBookTitle)['Book_title'];
			
			echo "<input type ='hidden' name = 'bookPriceArr[]' value = ".$bookPrice.">";
			echo "<input type ='hidden' name = 'shippingPriceArr[]' value = ".$bookDeliveryPrice.">";
			
			$deliveryOption = "Ground-Shipping";
			if($bookDeliveryPrice == "3.99"){
				$deliveryOption = "Express-Shipping";
			}
			echo "<tr><td>". $bookTitle. "</td> <td>".$deliveryOption."</td> <td> $".$bookPrice."</td> <td>$".$bookDeliveryPrice."</td></tr>";
			$bookPriceTotal +=  $bookPrice;
			$shippingPriceTotal += $bookDeliveryPrice;
		}

		echo "</table><br>";

		$totalPrice = $bookPriceTotal+$shippingPriceTotal;
		echo "<input type ='hidden' name = 'totalPrice' value = ".$totalPrice.">";

		echo "<h5>Your total order price is: $".($bookPriceTotal+$shippingPriceTotal).".</h5>";
		echo "<br>";

		echo "<center><button type = 'submit'; class='btn btn-primary btn-lg'; id = 'buyBooks' name = 'buyBooks'> Place Order </button></center> \n";
		echo "</form>";
		echo "</div>\n";
		echo "<br><br>";
	}
	else{
	    echo "<br><center><h4 style='color:red'>Your email address is incorrect! Please go back and try again.</h4></center><br>";
	}
}	
?>

<script >

    function plcaeOrder(){
		
	  var x  = confirm("Are you sure to place order?");
	  if (x == true)
		  return true;
	  else
		  return false;
	}

</script>
</div>

</body>
</html>
