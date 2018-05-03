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
        <a class="nav-link" href="resupplyBooks.php">Check Inventory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Orders.php">Review Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="DeleteBook.php">Remove a Book</a>
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
// variables to connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

// post variables used to insert a new book into database
$postName = $_POST['Title'];
$postISBN = $_POST['ISBN'];
$postAuthor = $_POST['Author'];
$postPublisher = $_POST['Publisher'];
$postEdition = $_POST['Edition'];
$postPrice = $_POST['Price'];
$postOnHand = $_POST['OnHand'];
$postImage = $_POST['bookImage'];

//connect to a database
$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

//insert user inputs into database
$dbAdd = ("INSERT INTO book (Book_title, ISBN, Author_name, Publishier, Edition, Book_price, Book_number, Book_image) VALUES ('$postName','$postISBN','$postAuthor','$postPublisher','$postEdition','$postPrice','$postOnHand','$postImage')");

// add contents to database if they are not added echo an error message
if(mysqli_query($db,$dbAdd)){
    echo ("Book has been added successfully!");
}
else{
    echo ("Could not do it!");
}  
?>