<?php
//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

//Query data 
if (isset($_POST['bookTitle'])){
	//Get Book Title
    $bookTitleIn = $_POST['bookTitle'];
	
	$selectTitle = ("SELECT Book_title, ISBN, Author_name, Publishier, Edition, Book_price, Book_image FROM book WHERE Book_title LIKE '%$bookTitleIn%'");
	$query1 = mysqli_query($db,$selectTitle) or die("could not search");
		if (mysqli_num_rows($query1) > 0 && $_POST['bookTitle'] != ""){
				echo "<form id='submit' method='get' action='buyBooks.php'; onsubmit = 'return buyConfirm()'>\n";						   
				echo "<div style = 'top: 200pt; margin:0 auto; width: 800px; background-color: AntiqueWhite'>\n";
				echo "<table border = '1' style='border-color: white'>";
				echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> ISBN </th> 
					  <th style ='padding: 15px; text-align: center'> Author Name </th> <th style ='padding: 15px; text-align: center'> Publisher </th>
					  <th style ='padding: 15px; text-align: center'> Edition </th> <th style ='padding: 15px; text-align: center'> Book Price($) </th> 
					  <th style ='padding: 15px; text-align: center'> Book Image </th> </tr>\n";	  
				while($row = mysqli_fetch_assoc($query1)){
					echo '<tr><td style ="padding: 15px; text-align: center">'.$row['Book_title'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['ISBN'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['Author_name'].'</td>';
					echo "<td style ='padding: 15px; text-align: center'>".$row['Publishier']."</td>";
					echo "<td style ='padding: 15px; text-align: center'>".$row['Edition']."</td>";
					echo "<td style ='padding: 15px; text-align: center'>$".$row['Book_price']."</td>";
					echo "<td style ='padding: 15px; text-align: center'><img src=images/".$row["Book_image"]."> 
						 <span> Buy This Book </span> <span> <input type ='checkbox' name = 'books[]' value=".$row['ISBN']."> </span></td></tr>";
				}
				echo "</table>\n";
				echo "</div>";
				if(isset($_POST['email'])){
					echo "<input type ='hidden' name = 'email' value = ".$_POST['email'].">";
				}				
				echo "<div id='button' style = 'top: 100pt; margin:0 auto; text-align: center; padding: 10pt;'>";
				echo "<button type = 'submit'; class='btn btn-primary btn-lg'; id = 'buyBooks' name = 'buyBooks'> Buy Books </button> \n";
				echo "</div>\n";
				echo "</form>\n";
		}

		else{
			echo "<center> No results! </center>";
		}
}

if (isset($_POST['bookISBN'])){
	//Get Book ISBN
    $bookISBNIn = $_POST['bookISBN'];
	
	$query2 = mysqli_query($db,"SELECT Book_title, ISBN, Author_name, Publishier, Edition, Book_price, Book_image FROM book WHERE ISBN LIKE '%$bookISBNIn%'") or die("could not search");
		if (mysqli_num_rows($query2) > 0 && $_POST['bookISBN'] != ""){			
				echo "<form id='submit' method='get' action='buyBooks.php'; onsubmit = 'return buyConfirm()'>\n";						   
				echo "<div style = 'top: 200pt; margin:0 auto; width: 800px; background-color: AntiqueWhite'>\n";
				echo "<table border = '1' style='border-color: white'>";
				echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> ISBN </th> 
					  <th style ='padding: 15px; text-align: center'> Author Name </th> <th style ='padding: 15px; text-align: center'> Publisher </th>
					  <th style ='padding: 15px; text-align: center'> Edition </th> <th style ='padding: 15px; text-align: center'> Book Price($) </th> 
					  <th style ='padding: 15px; text-align: center'> Book Image </th> </tr>\n";	  
				while($row = mysqli_fetch_assoc($query2)){
					echo '<tr><td style ="padding: 15px; text-align: center">'.$row['Book_title'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['ISBN'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['Author_name'].'</td>';
					echo "<td style ='padding: 15px; text-align: center'>".$row['Publishier']."</td>";
					echo "<td style ='padding: 15px; text-align: center'>".$row['Edition']."</td>";
					echo "<td style ='padding: 15px; text-align: center'>$".$row['Book_price']."</td>";
					echo "<td style ='padding: 15px; text-align: center'><img src=images/".$row["Book_image"]."> 
						 <span> Buy This Book </span> <span> <input type ='checkbox' name = 'books[]' value=".$row['ISBN']."> </span></td></tr>";
				}
				echo "</table>\n";
				echo "</div>";
				if(isset($_POST['email'])){
					echo "<input type ='hidden' name = 'email' value = ".$_POST['email'].">";
				}
				echo "<div id='button' style = 'top: 100pt; margin:0 auto; text-align: center; padding: 10pt;'>";
				echo "<button type = 'submit'; class='btn btn-primary btn-lg'; id = 'buyBooks' name = 'buyBooks'> Buy Books </button> \n";
				echo "</div>\n";
				echo "</form>\n";
		}

		else{
			echo "<center> No results! </center>";
		}
}

if (isset($_POST['authorName'])){
	//Get Book Author
	$authorNameIn = $_POST['authorName'];
	
	$query3 = mysqli_query($db,"SELECT Book_title, ISBN, Author_name, Publishier, Edition, Book_price, Book_image FROM book WHERE Author_name LIKE '%$authorNameIn%'") or die("could not search");
		if (mysqli_num_rows($query3) > 0 && $_POST['authorName'] != ""){
				echo "<form id='submit' method='get' action='buyBooks.php'; onsubmit = 'return buyConfirm()'>\n";						   
				echo "<div style = 'top: 200pt; margin:0 auto; width: 800px; background-color: AntiqueWhite'>\n";
				echo "<table border = '1' style='border-color: white'>";
				echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> ISBN </th> 
					  <th style ='padding: 15px; text-align: center'> Author Name </th> <th style ='padding: 15px; text-align: center'> Publisher </th>
					  <th style ='padding: 15px; text-align: center'> Edition </th> <th style ='padding: 15px; text-align: center'> Book Price($) </th> 
					  <th style ='padding: 15px; text-align: center'> Book Image </th> </tr>\n";	  
				while($row = mysqli_fetch_assoc($query3)){
					echo '<tr><td style ="padding: 15px; text-align: center">'.$row['Book_title'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['ISBN'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['Author_name'].'</td>';
					echo "<td style ='padding: 15px; text-align: center'>".$row['Publishier']."</td>";
					echo "<td style ='padding: 15px; text-align: center'>".$row['Edition']."</td>";
					echo "<td style ='padding: 15px; text-align: center'>$".$row['Book_price']."</td>";
					echo "<td style ='padding: 15px; text-align: center'><img src=images/".$row["Book_image"]."> 
						 <span> Buy This Book </span> <span> <input type ='checkbox' name = 'books[]' value=".$row['ISBN']."> </span></td></tr>";
				}
				echo "</table>\n";
				echo "</div>";
				if(isset($_POST['email'])){
					echo "<input type ='hidden' name = 'email' value = ".$_POST['email'].">";
				}
				echo "<div id='button' style = 'top: 100pt; margin:0 auto; text-align: center; padding: 10pt;'>";
				echo "<button type = 'submit'; class='btn btn-primary btn-lg'; id = 'buyBooks' name = 'buyBooks'> Buy Books </button> \n";
				echo "</div>\n";
				echo "</form>\n";
		}

		else{
			echo "<center> No results! </center>";
		}
}

?>