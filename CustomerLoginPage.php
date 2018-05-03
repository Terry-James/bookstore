<?php include 'top1.html';?>
 
<div class="container">
  <div class="row">
    
	<div class="col-sm-4">
      
    </div>
    
	<div class="col-sm-4" style = "background-color: LightBlue;">
	  </br></br>
	  
	  <h1 style="font-weight: bold; color: white; text-shadow:2px;"> Customer Login </h1>
         </br></br>	  
<?php
//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

if(isset($_POST['email'])){
	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];
	$Email = $_POST['email'];
	$Password = $_POST['password'];
	$Address = $_POST['address'];
	$Phone = $_POST['phone'];
	
	$queryEmail = mysqli_query($db,"select * from customer where Customer_Email ='$Email'") or die("could not work");
	$row = mysqli_fetch_assoc($queryEmail);
	
	if(!empty($row['Customer_Email'])){
		echo "<center><p style = 'color: red'>Your info is in the system already! Please log in to your account.</p></center>";
	}
	else {
		$queryAddInfor = mysqli_query($db,"Insert into customer values('$Lname', '$Fname', '$Email', '$Phone', '$Address', '$Password', 0)") or die("could not work");
		echo "<center><p style = 'color: green'>You have signed up successfully. Please log in to your account.</p></center>";
	}
}		 

?>	    
		<class="text-center">
		
		<form action= "CustomerSearchPage.php" class="form-signin" method="post">
			  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
			  
			  <label for="Email" class="sr-only">User name</label>
			  <input type="email" name="inputCustomerEmail" class="form-control" placeholder="Email" required="" autofocus="">
			  <label for="customerPassword" class="sr-only">Password</label>
			  <input type="password" name="inputPassword" class="form-control" placeholder="Password" required="">
			  
			  <div class="checkbox mb-3">
			  <label>
			  <input type="checkbox" value="remember-me"> Remember me
			  </label>
		      </div>
		     
			  <button class="btn btn-lg btn-block" type="submit">Sign in</button>
			  <br><p> First time user can sign up <a href = "CustomerSignUpPage.php"><span style="color: blue; font-weight:bold;
			          font-size: 15pt"><u>here</u></span>.</a> </p>
		  
		  <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
		</form>
		<a href = "index.php"><button class="btn btn-lg btn-block">Main page</button></a><br>
    </div>
    
	<div class="col-sm-4">
      
    </div>
  </div>
</div>
<br>
</body>
</html>
