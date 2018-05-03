<?php
session_start();
if(!isset($_SESSION['managerEmail'])){
  header("Location: ManagerLoginPage.html");
}
?>

<?php include 'top2.html';?>

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
        <a class="nav-link" href="ModifyBook.php">Update Books</a>
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
<div class="container my-3"  style = "background-color: LightBlue;">
	<div class="row">
		<div class="col-12 col-sm-6 order-2 order-sm-1" >
      <form action="bookDelete.php" method="POST">
        <div class="form-group">
          <label for="BookTitle"></label>
          <input type="text" placeholder="Enter Book Title of the Book" name="Title" class="form-control" id="Title">
        </div>
        <div class="form-group">
          <label for="BookISBN" ></label>
          <input type="text" placeholder= "Enter the ISBN of the Book" name= "ISBN" class="form-control" id="ISBN">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
		<div class="col-12 col-sm-6 order-1 order-sm-2">
			<h1 style="font-weight: bold; color: white; text-shadow:2px;"> Remove a Book </h1>
			</br></br>	  
		</div>
	</div>
</div>

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>