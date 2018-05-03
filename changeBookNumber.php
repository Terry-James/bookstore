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

<?php
// Create variables for connecting to a database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

// Connect to database
$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

//Query data 
if (isset($_POST['bookISBN']) && isset($_POST['bookNum'])){	
	// Set variables for the book isbn and the number of books
  $bookISBN = $_POST['bookISBN'];
  $newBookNum = $_POST['bookNum'];
  
  // Update the book table and set the number of books avaible to a new value based on the book isbn
  $updatebyISBN = ("UPDATE book SET Book_number = '$newBookNum' WHERE book.ISBN = '$bookISBN'");
  $updateBookNumber = mysqli_query($db,$updatebyISBN) or die("could not work!");
  
  $selectByISBN = ("SELECT Book_title, ISBN, Author_name, Book_number, Book_price, Book_image FROM book WHERE ISBN = '$bookISBN'");
  $query1 = mysqli_query($db,$selectByISBN) or die("could not work!");
  
    // if the number of rows is greater than 0 and the number of books is not empty create table for results
		if (mysqli_num_rows($query1) > 0 && $_POST['bookNum'] != ""){	
        echo "<center><h5> New Book Number Result </h5></center> </br>";		
				echo "<div style = 'top: 200pt; margin:0 auto; width: 800px; background-color: AntiqueWhite'>\n";
				echo "<table border = '1' style='border-color: white'>";
				echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> ISBN </th> 
					  <th style ='padding: 15px; text-align: center'> Author Name </th> <th style ='padding: 15px; text-align: center'> Book Number </th>
					  <th style ='padding: 15px; text-align: center'> Book Price($) </th> 
            <th style ='padding: 15px; text-align: center'> Book Image </th> </tr>\n";
        // keep echoing results for all elements in the array	  
				while($row = mysqli_fetch_assoc($query1)){
					echo '<tr><td style ="padding: 15px; text-align: center">'.$row['Book_title'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['ISBN'].'</td>';
					echo '<td style ="padding: 15px; text-align: center">'.$row['Author_name'].'</td>';
					echo "<td style ='padding: 15px; text-align: center'>".$row['Book_number']."<br>
					      <span style='color: green'> Book number has been changed successfully. </span></td>";
					echo "<td style ='padding: 15px; text-align: center'>$".$row['Book_price']."</td>";
					echo "<td style ='padding: 15px; text-align: center'><img src=images/".$row["Book_image"]."> </td></tr>";
				}
				echo "</table>\n";
				echo "</div>";
		}
    // not results if nothing found
		else{
			echo "<center> No result! </center>";
		}
}

?>