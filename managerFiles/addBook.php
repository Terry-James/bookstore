<?php
session_start();
if(!isset($_SESSION['managerEmail'])){
  header("Location: ManagerLoginPage.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Book Page</title>
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
        <a class="nav-link" href="resupplyBooks.php">Check Inventory</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Orders.php">Review Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ModifyBook.php">Update Books</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="DeleteBook.php">Remove a Book</a>
      </li>
    </ul>
  </nav>
</div>
</br>
<div class="container my-3"  style = "background-color: LightBlue;">
	<div class="row">
		<div class="col-12 col-sm-6 order-2 order-sm-1" >
      <form action="Bookadd.php" method="POST">
        <div class="form-group">
          <label for="BookTitle"></label>
          <input type="text" placeholder="Enter Book Title" name="Title" class="form-control" id="Title">
        </div>
        <div class="form-group">
          <label for="BookISBN" ></label>
          <input type="text" placeholder= "Enter the ISBN" name= "ISBN" class="form-control" id="ISBN">
        </div>
        <div class="form-group">
          <label for="Author"></label>
          <input type="text" placeholder="Enter Author" name="Author" class="form-control" id="Author">
        </div>
        <div class="form-group">
          <label for="BookPublisher"></label>
          <input type="text" placeholder= "Enter Publisher" name="Publisher" class="form-control" id="Publisher">
        </div>
        <div class="form-group">
          <label for="BookEdition"></label>
          <input type="text" placeholder="Enter Book Edition" name="Edition" class="form-control" id="Edition">
        </div>
        <div class="form-group">
          <label for="BookPrice"></label>
          <input type="text" placeholder= "Enter the Price" name="Price" class="form-control" id="Price">
        </div>
        <div class="form-group">
          <label for="NumberonHand"></label>
          <input type="text" placeholder="Enter the number currently on hand" name="OnHand" class="form-control" id="OnHand">
        </div>
        <div class="form-group">
          <label for="SourceImage"></label>
          <input type="text" placeholder="Enter Location of Book Image" name="bookImage" class="form-control" id="BookImage">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <div id="result"></div>
      </form>
    </div>
		<div class="col-12 col-sm-6 order-1 order-sm-2">
			<h1 style="font-weight: bold; color: white; text-shadow:2px;"> Add a Book </h1>
			</br></br>	  
		</div>
	</div>
</div>

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>