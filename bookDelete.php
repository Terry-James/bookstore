<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Book Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="cssFiles/mainCSS.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<?php include 'top2.html';?>

<div class="col-sm-12">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Links -->
    <a class="navbar-brand" href="managerPage.php">Home</a>
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="addBook.php">Add Book</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resupplyBooks.php">Check Inventory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Orders.php">Review Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logOut.php"> Log Out </a>
      </li>
    </ul>
  </nav>
</div>
</br>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>

<?php
// variables to connect to a database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

// set post variables 
$bookInput = $_POST['Title'];

// connect to a database
$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

// make sure the book title field is set delete the book from database and echo a success message
if (isset($bookInput)){
    $bookTitle = ("DELETE FROM book WHERE Book_title = '$bookInput'");
    if (mysqli_query($db, $bookTitle)) {
        echo ("Book Removed");  
    } 
}
// return to the managers page an error occurs
else{
    header("Location:managerPage.html");
    exit();
}