<?php
//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

if (isset ($_GET['buyBooks'])){
	if(!empty($_GET['books'])){
		$checkedCount = count($_GET['books']);
		echo "</br><center><h5>You have selected following " .$checkedCount." Book(s):</h5></center> </br>";		
		echo "<div style = 'display: table; margin: 0 auto; border-style:solid; border-color:white; border-width:4px;'>\n";
		echo "<form name='buyBook' method='post' action='confirmOrder.php' onsubmit = 'return buyConfirm();'>";
		echo "<table>";
		echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> ISBN </th> 
			  <th style ='padding: 15px; text-align: center'> Author Name </th> <th style ='padding: 15px; text-align: center'> Book Price($) </th> 
			  <th style ='padding: 15px; text-align: center'> Book Image </th> </tr>\n";
		
		foreach($_GET['books'] as $selected) {
		$bookISBNIn =  $selected;		
		$query = mysqli_query($db,"SELECT Book_title, ISBN, Author_name, Book_price, Book_image FROM book WHERE ISBN = '$bookISBNIn'") or die("could not work");
	    
		$queryBookNum = mysqli_query($db,"SELECT Book_number FROM book WHERE ISBN = '$bookISBNIn'") or die("could not work");
        $bookNum = mysqli_fetch_assoc($queryBookNum)['Book_number'];
		
		while($row = mysqli_fetch_assoc($query)){
			$ground = 1.99;
			$express = 3.99;
			echo "<tr>";
			echo "<td style ='padding: 15px; text-align: center'>".$row['Book_title']."</td>";
			echo "<td style ='padding: 15px; text-align: center'>".$row['ISBN']."</td>";
			echo "<td style ='padding: 15px; text-align: center'>".$row['Author_name']."</td>";
			echo "<td style ='padding: 15px; text-align: center'>$".$row['Book_price']."</td>";
			if ($bookNum == 0){
				echo "<td style ='padding: 15px; text-align: center'><img src=images/".$row["Book_image"]."><br><span style='color:red'> This book is out of stock! </span>
				      <br><br><span style='font-weight: bold'>Delivery option:</span> <select name = 'delivery[]'>
									<option value = ".$row['ISBN'].",".$ground.",".$row['Book_price']."> Ground Shipping ($1.99) </option>
							   </select> </td>";
		    }
			else{
				echo "<td style ='padding: 15px; text-align: center'><img src=images/".$row["Book_image"].">
				      <br><br><span style='font-weight: bold'>Delivery option:</span> <select name = 'delivery[]'> <span id='deErr'> </span>
									<option value = ".$row['ISBN'].",".$ground.",".$row['Book_price']."> Ground Shipping ($1.99) </option>
									<option value = ".$row['ISBN'].",".$express.",".$row['Book_price']."> Express Shipping ($3.99) </option>
							   </select> </td>";
			}
			echo "<tr>";
			
	    }
	    }
		echo "</table>\n";		
		echo "</div><br><br><br>";
		
		
		echo "<div style = 'margin: 0 auto; padding: 15pt; width: 450pt; border-style:solid; border-color:white; border-width:4px;'>\n";
		echo "<center><h3> Billing Information </h3></center><br><br>";		
			  
		echo "<span style='font-weight: bold'>Email:</span> <input type='email' name='email' required size='50' placeholder ='Enter your email address'> 
			  <br><br>";			  
		
		echo "<span style='font-weight: bold'>Card Number:</span> <input type='text' name='card' required size = '17' maxlength='16' placeholder ='Card number'>
              <span> Remember Card? </span> <span> <input type ='checkbox' name = 'yes' value='yes'> yes </span>";
			  
		echo "<p id='cardError' style='color: red'> </p>";	  
        		
		echo "</div>";

        echo "<div id='button' style = 'top: 100pt; margin:0 auto; text-align: center; padding: 10pt;'>";
		echo "<button type = 'submit'; class='btn btn-primary btn-lg'; id = 'buyBooks' name = 'buyBooks'> Submit </button> \n";
		echo "</div>\n";

        if(isset($_GET['email'])){
			$correctEmail = $_GET['email'];
			echo "<input type ='hidden' name = 'correctEmail' value = ".$correctEmail.">";
		}			
 		
		echo "</form>";	  
		echo "<br>";
	}
	else
		echo "<br><center><h5 style='color: red'>You did not select any books!</h5></center><br>";	
}
?>