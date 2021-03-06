<?php
session_start();
if(!isset($_SESSION['managerEmail'])){
  header("Location: ManagerLoginPage.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resupply Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="cssFiles/mainCSS.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body style="background-image: url(images/paper.png)">

<?php include 'top2.html';?>

<div class="col-sm-12">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Links -->
    <a class="navbar-brand" href="managerPage.php"> Home </a>
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
        <a class="nav-link" href="logOut1.php">Log Out</a>
      </li>
    </ul>
  </nav>
</div>
</br>
<div class="container">
	<div class="row">
		<div class="col-sm-4" ></div>
		<div class="col-sm-4">
			<br><h1 style="font-weight: bold; text-shadow:2px;"> Check Inventory </h1>
      </br></br>
      <class="text-center">
        <form action="resupply.php" class="form-signin" method="post">
            <button class="btn btn-lg btn-primary" name="resupply" type="submit">Check</button></a>
          </form><br>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>