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
			
				if(isset($_POST['deliveryId'])){
					$Delivery_id = $_POST['deliveryId'];
					$queryEmail =  mysqli_query($db, "Select Customer_email from book_order where Delivery_id = '$Delivery_id'") 
					               or die("Could not work!");
					$row = mysqli_fetch_assoc($queryEmail);
                    $email = $row['Customer_email'];                    
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
				
					if(isset($_POST['deliveryId'])){
						$Delivery_id = $_POST['deliveryId'];
						$queryEmail =  mysqli_query($db, "Select Customer_email from book_order where Delivery_id = '$Delivery_id'") 
									   or die("Could not work!");
						$row = mysqli_fetch_assoc($queryEmail);
						$email = $row['Customer_email'];                    
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
  
<div class="container">

<?php

//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';
$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

date_default_timezone_set('America/Chicago');
if(isset($_POST['deliveryId'])){
	$Delivery_id = $_POST['deliveryId'];
	$queryOrderDate =  mysqli_query($db, "Select Date, Delivery_method from book_order where Delivery_id = '$Delivery_id'") 
				   or die("Could not work!");
	$row = mysqli_fetch_assoc($queryOrderDate);
	$orderDate = $row['Date'];
	$today = date("Y/m/d");
	$deliveryMethod = $row['Delivery_method'];
	
	function dateDiff($start, $end){
		$start_ts = strtotime($start);
		$end_ts = strtotime($end);
		$diff = $end_ts - $start_ts;
		return round($diff/86400);
	}
	
	echo "</br><center><h5> Book Shipping Status </h5></center> </br>";
	
	echo "<div style = 'margin: 0 auto;'>\n";
	echo "<center><table border = '1' style='border-color: white'>";
	echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> 
			   <th style ='padding: 15px; text-align: center'> Order Date </th>
			   <th style ='padding: 15px; text-align: center'> Delivery Method </th>
			   <th style ='padding: 15px; text-align: center'> Shipping Id </th>
			   </tr>\n";
	
	echo "<tr><td style ='padding: 15px; text-align: center'>".$_POST['bookTitle']."</td>";   
	echo "    <td style ='padding: 15px; text-align: center'>".$_POST['orderDate']."</td>";
	echo "    <td style ='padding: 15px; text-align: center'>".$_POST['deliveryMethod']."</td>";
	echo "    <td style ='padding: 15px; text-align: center'>".$_POST['deliveryId']."</td></tr>";
	
	if ($deliveryMethod == "Express Shipping" && isset($_POST['expressDays'])){
		$orderDate1 = date_create($orderDate);
		date_add($orderDate1, date_interval_create_from_date_string($_POST['expressDays']." days"));
		$deliveryDate = date_format($orderDate1,"Y/m/d");
		$dateDiff = dateDiff($today, $deliveryDate);
		
		echo "<tr><th style ='padding: 15px; text-align: center'> Shipping Status: </th>";
		if($dateDiff < 0){
			echo "<td colspan='3' style ='padding: 15px; text-align: center; color: green; font-weight: bold'> Your book has been delivered on ".$deliveryDate.". </td></tr>";
		}
		
		else if($dateDiff > 0){
			echo "<td colspan='3' style ='padding: 15px; text-align: center; color: brown; font-weight: bold'> Your book is on the way and will be delivered on ".$deliveryDate.". </td></tr>";
		}
		
		else if($dateDiff == 0){
			echo "<td colspan='3' style ='padding: 15px; text-align: center; color: blue; font-weight: bold'> Your book is being delivered on today: ".$deliveryDate.". </td></tr>";
		}
		
	}
    else if($deliveryMethod == "Ground Shipping" && isset($_POST['groundDays'])){
		$orderDate1 = date_create($orderDate);
		date_add($orderDate1, date_interval_create_from_date_string($_POST['groundDays']." days"));
		$deliveryDate = date_format($orderDate1,"Y/m/d");
		$dateDiff = dateDiff($today, $deliveryDate);
		
		echo "<tr><th style ='padding: 15px; text-align: center'> Shipping Status: </th>";
		if($dateDiff < 0){
			echo "<td colspan='3' style ='padding: 15px; text-align: center; color: green; font-weight: bold'> Your book has been delivered on ".$deliveryDate.". </td></tr>";
		}
		
		else if($dateDiff > 0){
			echo "<td colspan='3' style ='padding: 15px; text-align: center; color: brown; font-weight: bold'> Your book is on the way and will be delivered on ".$deliveryDate.". </td></tr>";
		}
		
		else if($dateDiff == 0){
			echo "<td colspan='3' style ='padding: 15px; text-align: center; color: blue; font-weight: bold'> Your book is being delivered on today: ".$deliveryDate.". </td></tr>";
		}
		
	}

    echo "</table></center><br><br>";
	echo "</div>";	

}

?>

</div>



</body>
</html>
