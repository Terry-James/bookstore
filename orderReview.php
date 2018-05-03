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
				//Connect to database
				$db_host = 'localhost';
				$db_username = 'root';
				$db_pass = '';
				$db_name = 'bookstore';
				$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");
			
				if(isset($_POST['customerEmail'])){
					$email = $_POST['customerEmail'];                    
					echo "<form method='post' action='CustomerViewOrdersPage.php'>";					
					echo "<input type ='hidden' name = 'email' value = ".$email.">";
					echo "<button class='btn btn-primary' type='submit'> View Orders </button>";
					echo "</form>";
				}
			?> 
			
		</li>
		
		<li class="nav-item mx-2">
			<?php
				//Connect to database
				$db_host = 'localhost';
				$db_username = 'root';
				$db_pass = '';
				$db_name = 'bookstore';
				$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");
				
				if(isset($_POST['customerEmail'])){
					$email = $_POST['customerEmail'];                    
					echo "<form method='post' action='CustomerSearchPage.php'>";					
					echo "<input type ='hidden' name = 'email' value = ".$email.">";
					echo "<button class='btn btn-primary' type='submit'> Continue Shopping </button>";
					echo "</form>";
				}
		    ?>
			
		</li>
		
		<li class="nav-item mx-2">
			<a href="logOut.php"> <button class='btn btn-primary'> Log Off </button> </a>
		</li>
    
	</ul>
</nav>
  
<div class="container">

<?php
//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

$ISBNArray = $_POST['bookISBNArr'];
$bookPriceArray = $_POST['bookPriceArr'];
$shippingPriceArray = $_POST['shippingPriceArr'];
$totalPrice = $_POST['totalPrice'];
$customerEmail = $_POST['customerEmail'];
$customerFName = $_POST['customerFName'];
$customerLName = $_POST['customerLName'];
$customerAddress = $_POST['customerAddress'];
$customerPhone = $_POST['customerPhone'];

$number1 = generateOrderId();
$number2 = generateOrderId();

$Express_id = "EX".$number1;
$Ground_id = "GR".$number2; 

echo "<br><center><h2> Order Review </h2></center><br>";
echo "<div style = 'margin: 0 auto; padding: 15pt; width: 640pt; border-style:solid; border-color:LightGray; border-width:4px;'>\n";
echo "<span style='font-weight: bold'>Customer Name: </span>".$customerFName.", ".$customerLName;
echo "<br><br><span style='font-weight: bold'>Email: </span>".$customerEmail;
echo "<br><br><span style='font-weight: bold'>Shipping Address: </span>".$customerAddress;
echo "<br><br><span style='font-weight: bold'>Phone: </span>".$customerPhone;


echo "<br><br><center><h5 style='font-weight: bold'>Order Price Summary </h5></center><br>";

echo "<table border='1'>";
echo "<tr><th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> Delivery Option </th> 
      <th style ='padding: 15px; text-align: center'> Book Price </th> <th style ='padding: 15px; text-align: center'> Shipping Price </th> 
	  <th style ='padding: 15px; text-align: center'> Order Price </th> <th style ='padding: 15px; text-align: center'> Order ID </th> 
	  <th style ='padding: 15px; text-align: center'> Estimated Delivery Time </th>
	  <th style ='padding: 15px; text-align: center'> Shipping ID </th></tr>";

$orderNum = count($ISBNArray);	  
$queryUpdateCustomerOrderNumber = mysqli_query($db,"Update customer Set Order_number = Order_number + '$orderNum' where Customer_Email = '$customerEmail'") or die("could not work");	  
for($i = 0; $i < count($ISBNArray); $i++){
	$bookISBN = $ISBNArray[$i];
	$bookPrice = $bookPriceArray[$i];
	$shippingPrice = $shippingPriceArray[$i];
	$orderId = generateOrderId();
	$orderPrice = $bookPrice + $shippingPrice;
	$queryBookTitle = mysqli_query($db,"SELECT Book_title FROM book WHERE ISBN = '$bookISBN'") or die("could not work");
	$bookTitle = mysqli_fetch_assoc($queryBookTitle)['Book_title'];
		
	$deliveryOption = " ";
	$deliveryTime = " ";
	date_default_timezone_set('America/Chicago');
	$orderDate = date("Y/m/d");
	
	if($shippingPrice == "3.99"){
		$deliveryOption = "Express Shipping";
		$deliveryTime = "1-2 Days";
		$queryAddOrder = mysqli_query($db,"Insert into book_order value
	    ('$bookISBN', '$orderId', '$customerEmail', '$orderDate', '$orderPrice','$deliveryOption', '$shippingPrice', '$Express_id')") or die("could not work");
	    echo "<tr><td>".$bookTitle. "</td> <td>".$deliveryOption."</td> <td> $".$bookPrice."</td> <td>$".$shippingPrice."</td>
	      <td>$".$orderPrice."</td><td>".$orderId."</td> <td>".$deliveryTime."</td> <td>".$Express_id."</td> </tr>";
	}
	
	if($shippingPrice == "1.99"){
		$deliveryOption = "Ground Shipping";
		$deliveryTime = "5-10 Days";
		$queryAddOrder = mysqli_query($db,"Insert into book_order value
	    ('$bookISBN', '$orderId', '$customerEmail', '$orderDate', '$orderPrice','$deliveryOption', '$shippingPrice', '$Ground_id')") or die("could not work");
	    echo "<tr><td>".$bookTitle. "</td> <td>".$deliveryOption."</td> <td> $".$bookPrice."</td> <td>$".$shippingPrice."</td>
	      <td>$".$orderPrice."</td><td>".$orderId."</td> <td>".$deliveryTime."</td> <td>".$Ground_id."</td> </tr>";
	}
		
	$queryUpdateBookStock = mysqli_query($db,"Update Book, Book_order Set Book_number = Book_number -1 Where Book_order.Book_ISBN = Book.ISBN and Book.ISBN = '$bookISBN' ") or die("could not work");
}
echo "</table>";
echo "<br><br><span style='font-weight: bold'>Total Order Price: $".$totalPrice."</span><br>";
echo "</div><br><br>";

function generateOrderId() {
  $text = "";
  $possible = "0123456789";
  
  for ($i = 0; $i < 9; $i++)
    $text .= $possible[rand(0,9)];
   
  return $text;
}

?>

</div>

</body>
</html>
