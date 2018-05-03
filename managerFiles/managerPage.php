<?php
session_start();
if(!isset($_SESSION['managerEmail'])){
  header("Location: ManagerLoginPage.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Manager Page</title>
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
        <a class="navbar-brand" href="#">
          Book Store
        </a> 
        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="resupplyBooks.php">Check Inventroy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="addBook.php">Add Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Orders.php">Review Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ModifyBook.php">Update Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="DeleteBook.php">Remove Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logOut.php">Log Out</a>
          </li>
          
        </ul>
      </nav>
</div>
</br>  
<div class="container">
		<center><h1 style="font-weight: bold; text-shadow:2px; background-color: none"> Welcome </h1></center>	
</div>

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>