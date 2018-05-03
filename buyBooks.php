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
				if(isset($_GET['email'])){
					$email = $_GET['email'];                    
					echo "<form method='post' action='CustomerViewOrdersPage.php'>";					
					echo "<input type ='hidden' name = 'email' value = ".$email.">";
					echo "<button class='btn btn-primary' type='submit'> View Orders </button>";
					echo "</form>";
				}
			?> 
			
		</li>
		
		<li class="nav-item mx-2">
			<?php
				if(isset($_GET['email'])){
					$email = $_GET['email'];                    
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


  
<div class="container">

  <?php include 'buyBooksPHP.php'; ?>

  </div>


<script >

    function buyConfirm(){
		
	  var x  = confirm("Are you sure to submit?");
	  if (x == true && validateCard() == true)
		  return true;
	  else
		  return false;
	}
	
	function validateCard(){
		var x = document.forms["buyBook"]["card"].value;
		if(x.length != 16){
			document.getElementById("cardError").innerHTML = "Card number must be 16-digits long!"
			return false;
		}
		else if (allNum(x) == false){
			document.getElementById("cardError").innerHTML = "Card number must be digits!"
			return false;			
		}
		else{
			return true;
		}
	}
	
	function allNum(inputtxt){
	  	var x = inputtxt;
		var isnum = /^\d+$/.test(x);
		if (isnum == true){
			return true;
		}
		else{
			return false;
		}
  }

</script>

</body>
</html>
