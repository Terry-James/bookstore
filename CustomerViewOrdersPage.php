<?php
session_start();
if(!isset($_SESSION['email'])){
  header("Location: CustomerLoginPage.php");
}
?>

<?php include 'top1.html';?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    
    <ul class="navbar-nav">
		
		<li class="nav-item mx-2">	
            <?php
			    echo "<form method='post' action='CustomerSearchPage.php'>";
				if(isset($_POST['email'])){
					echo "<input type ='hidden' name = 'email' value = ".$_POST['email'].">";
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
  
<div class="container">

<?php
//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';
$cookie_name = 'user';
$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

if(isset($_POST['email'])){
	$email = $_POST['email'];
	$queryOrder = mysqli_query($db, "SELECT Book_title, Book_price, Delivery_price, Order_price, Order_id, Date, Delivery_method, 
        	                   Delivery_id FROM book, book_order Where book_order.Customer_email = '$email' and book_order.Book_ISBN = book.ISBN
							   ") or die("Could not work!");
	echo "</br><center><h5> Book Orders Summary </h5></center> </br>";
	
	$queryOrderNum = mysqli_query($db, "SELECT Order_number from customer where Customer_email = '$email'") or die ("Could not work!");
	$result = mysqli_fetch_assoc($queryOrderNum);
	$orderNum = $result['Order_number'];
    $expressDays = rand(1,2);
    $groundDays = rand(5,10);
	if($orderNum != 0){	
		echo "<div style = 'margin: 0 auto;'>\n";
		echo "<center><table border = '1' style='border-color: white'>";
		echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> 
				   <th style ='padding: 15px; text-align: center'> Book Price </th> 
				   <th style ='padding: 15px; text-align: center'> Delivery Price </th>
				   <th style ='padding: 15px; text-align: center'> Order Price </th>
				   <th style ='padding: 15px; text-align: center'> Order Id </th>
				   <th style ='padding: 15px; text-align: center'> Order Date </th>
				   <th style ='padding: 15px; text-align: center'> Delivery Method </th>
				   <th style ='padding: 15px; text-align: center'> Shipping Id </th>
				   </tr>\n";
		
		while($row = mysqli_fetch_assoc($queryOrder)){
				echo "<tr><td style ='padding: 15px; text-align: center'>".$row['Book_title']."</td>";
				echo "<td style ='padding: 15px; text-align: center'>$".$row['Book_price']."</td>";
				echo "<td style ='padding: 15px; text-align: center'>$".$row['Delivery_price']."</td>";
				echo "<td style ='padding: 15px; text-align: center'>$".$row['Order_price']."</td>";			
				echo "<td style ='padding: 15px; text-align: center'>".$row['Order_id']."</td>";
				echo "<td style ='padding: 15px; text-align: center'>".$row['Date']."</td>";
				echo "<td style ='padding: 15px; text-align: center'>".$row['Delivery_method']."</td>";
				if($row['Delivery_method'] == "Express Shipping"){
					echo "<td style ='padding: 15px; text-align: center'>".$row['Delivery_id']."
					        <br><form method = 'post' action = 'CustomerTrackOrdersPage.php'>
							    <input type= 'hidden' name = 'bookTitle' value =' ".$row['Book_title']." '>
								<input type= 'hidden' name = 'orderDate' value =".$row['Date'].">
                                <input type= 'hidden' name = 'deliveryMethod' value =".$row['Delivery_method'].">								
								<input type= 'hidden' name = 'expressDays' value =".$expressDays.">
								<input type= 'hidden' name = 'deliveryId' value =".$row['Delivery_id'].">
								<button class='btn btn-primary' type = 'submit'> Track Order </button>
	   					        </form></td></tr>";
		        }
				else if($row['Delivery_method'] == "Ground Shipping"){
					echo "<td style ='padding: 15px; text-align: center'>".$row['Delivery_id']."
					        <br><form method = 'post' action = 'CustomerTrackOrdersPage.php'>
							    <input type= 'hidden' name = 'bookTitle' value =' ".$row['Book_title']." '>
                                <input type= 'hidden' name = 'orderDate' value =".$row['Date'].">
								<input type= 'hidden' name = 'deliveryMethod' value =".$row['Delivery_method'].">
							    <input type= 'hidden' name = 'groundDays' value =".$groundDays."> 
								<input type= 'hidden' name = 'deliveryId' value =".$row['Delivery_id'].">
								<button class='btn btn-primary' type = 'submit'> Track Order </button>
	   					        </form></td></tr>";
		        }
		}    
		echo "</table></center><br><br>";
		echo "</div>";
	}
    else{
		echo "<center> <h4> You do not have any orders. </h4></center><br><br>";
	}
	
}


?>

</div>



</body>
</html>
