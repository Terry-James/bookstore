<?php
session_start();
if(!isset($_SESSION['managerEmail'])){
  header("Location: ManagerLoginPage.html");
}
?>
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

<div class="container">
  <div class="row">
    
	<div class="col-sm-4">
      
    </div>
	
	<div class="col-sm-4">
	</br></br>
	<h4 style="color: LightCoral"> Search book to modify</h4>
	<p style="color: LightCoral"> (Enter search content accurately) </p>
	        <form id="search" method="post" action="bookModify.php">				  
				  <span style="color: blue; font-weight: bold"> Search by book title:</span> <input type="text" name="bookTitle" size="50" placeholder= "Search book tilte"> 
				  <br><br>
				  <button type="submit" class="btn btn-success"> Search </button>
				  <br><br>
			</form>
            
			<form id="search" method="post" action="bookModify.php"> 			
				  <span style="color: blue;font-weight: bold">Search by book ISBN:</span> <input type="text" name="bookISBN" maxlength="13" size="50" placeholder= "Search book ISBN"> 
				  <br><br>
				  <button type="submit" class="btn btn-success"> Search </button>
				  <br><br>
			</form>            			
	  
	  </br>
    </div>
    
	<div class="col-sm-4">
      
    </div>
  </div>
</div>
<br>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>