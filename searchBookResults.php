<?php
session_start();
if(!isset($_SESSION['customerEmail'])){
  header("Location: CustomerLoginPage.php");
}
?>
<?php include 'top1.html';?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    
    <ul class="navbar-nav">
        
		<li class="nav-item mx-2">
			<?php			
				if(isset($_POST['email'])){
					$email = $_POST['email'];                    
					echo "<form method='post' action='CustomerViewOrdersPage.php'>";					
					echo "<input type ='hidden' name = 'email' value = ".$email.">";
					echo "<button class='btn btn-primary' type='submit'> View Orders </button>";
					echo "</form>";
				}
			?> 
			
		</li>
		
		<li class="nav-item mx-2">
			<?php
				if(isset($_POST['email'])){
					$email = $_POST['email'];                    
					echo "<form method='post' action='CustomerSearchPage.php'>";					
					echo "<input type ='hidden' name = 'email' value = ".$email.">";
					echo "<button class='btn btn-primary' type='submit'> Search Books </button>";
					echo "</form>";
				}
		    ?>
			
		</li>
		
		<li class="nav-item mx-2">
			<a href="logOut.php"> <button class='btn btn-primary'> Log Off </button> </a>
		</li>
    
	</ul>
</nav>
<br>
<h3 style="text-align: center;"> Book Search Result </h3>
</br>

<?php include 'searchBook.php';?>


<script >

    function buyConfirm(){
		
	  var x  = confirm("Are you sure to submit?");
	  if (x == true)
		  return true;
	  else
		  return false;
	}

</script>