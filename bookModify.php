<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update a Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="cssFiles/mainCSS.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body style="background-image: url(images/paper.png)">

<div class="jumbotron text-center" id="top" style="background-image: url(images/books.png)"></div>

<div class="col-sm-12">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="managerPage.php">
      Home
    </a>
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="addBook.php">Add a Book</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Orders.php">Review Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="DeleteBook.php">Remove a Book</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resupplyBooks.php">Check Inventory</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="logOut1.php">Log Out</a>
      </li>
    </ul>
  </nav>
</div>
</br>

<form method = "post" action = "changeBookNumber.php">
<?php
// variables to connect to a database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

// connect to a database
$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

// make sure the post variable for book title is set 
if (isset($_POST['bookTitle'])){
	//Get Book Title
	$bookTitleIn = $_POST['bookTitle'];
	// Find the book by title
	$selectBook = ("SELECT Book_title, ISBN, Author_name, Book_number, Book_price, Book_image FROM book WHERE Book_title = '$bookTitleIn'");
	// query database for results from selectBook
	$query1 = mysqli_query($db, $selectBook) or die("could not search");
		// if the number of rows is greater than 0 and the title is not empty echo the results in a table
		if (mysqli_num_rows($query1) > 0 && $_POST['bookTitle'] != ""){
                echo "<center><h5> Change Book Number </h5></center> </br>";			
				echo "<div style = 'top: 200pt; margin:0 auto; width: 800px; background-color: AntiqueWhite'>\n";
				echo "<table border = '1' style='border-color: white'>";
				echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> ISBN </th> 
					  <th style ='padding: 15px; text-align: center'> Author Name </th> <th style ='padding: 15px; text-align: center'> Book Number </th>
					  <th style ='padding: 15px; text-align: center'> Book Price($) </th> 
						<th style ='padding: 15px; text-align: center'> Book Image </th> </tr>\n";	
				// continue to echo results of the array  
				while($row = mysqli_fetch_assoc($query1)){
					echo '<tr><td style ="padding: 15px; text-align: center">'.$row['Book_title'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['ISBN'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['Author_name'].'</td>';
					echo "<td style ='padding: 15px; text-align: center'>".$row['Book_number']."<br>
					      <input type = 'hidden' name = 'bookISBN' value = ".$row['ISBN'].">
						  <br><input type = 'number' name = 'bookNum' min = '5' placeholder = 'Enter number >= 5'>
					      <br><br><button class='btn btn-primary' type = 'submit' id = 'bookNumber' onclick = 'changeBookNumber()'> Change </button></td>";
					echo "<td style ='padding: 15px; text-align: center'>$".$row['Book_price']."</td>";
					echo "<td style ='padding: 15px; text-align: center'><img src=images/".$row["Book_image"]."> </td></tr>";
				}
				echo "</table>\n";
				echo "</div>";
		}

		else{
			echo "<center> No result! </center>";
		}
}

if (isset($_POST['bookISBN'])){
	// Set variable for ISBN set by user
	$bookISBNIn = $_POST['bookISBN'];
	// Find book by ISBN
	$selectISBN = ("SELECT Book_title, ISBN, Author_name, Book_number, Book_price, Book_image FROM book WHERE ISBN = '$bookISBNIn'");
	//  Query the database for the book by the selectISBN variable
	$query2 = mysqli_query($db,$selectISBN) or die("could not search");
				// if the number of rows is greater than 0 and the ISBN is not empty echo the results in a table
		if (mysqli_num_rows($query2) > 0 && $_POST['bookISBN'] != ""){
                echo "<center><h5> Change Book Number </h5></center> </br>";			
				echo "<div style = 'top: 200pt; margin:0 auto; width: 800px; background-color: AntiqueWhite'>\n";
				echo "<table border = '1' style='border-color: white'>";
				echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> ISBN </th> 
					  <th style ='padding: 15px; text-align: center'> Author Name </th> <th style ='padding: 15px; text-align: center'> Book Number </th>
					  <th style ='padding: 15px; text-align: center'> Book Price($) </th> 
						<th style ='padding: 15px; text-align: center'> Book Image </th> </tr>\n";
				// continue thru each row in the array and echo out into a table  
				while($row = mysqli_fetch_assoc($query2)){
					echo '<tr><td style ="padding: 15px; text-align: center">'.$row['Book_title'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['ISBN'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['Author_name'].'</td>';
					echo "<td style ='padding: 15px; text-align: center'>".$row['Book_number']."<br>
					      <input type = 'hidden' name = 'bookISBN' value = ".$row['ISBN'].">
						  <br><input type = 'number' name = 'bookNum' min = '5' placeholder = 'Enter number >= 5'>
					      <br><br><button class='btn btn-primary' type = 'submit' id = 'bookNumber' onclick = 'changeBookNumber()'> Change </button></td>";
					echo "<td style ='padding: 15px; text-align: center'>$".$row['Book_price']."</td>";
					echo "<td style ='padding: 15px; text-align: center'><img src=images/".$row["Book_image"]."> </td></tr>";
				}
				echo "</table>\n";
				echo "</div>";
		}

		else{
			echo "<center> No result! </center>";
		}
}
?>
</form>