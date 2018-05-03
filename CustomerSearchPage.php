<?php 
session_start();
?>

<?php include 'CustomerValidation.php';?>

<?php include 'top1.html';?>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    
    <ul class="navbar-nav">
		<li class="nav-item mx-2"> 
				<?php
					if(isset($_POST['email'])){
						$_SESSION['email'] = $_POST['email'];
						echo "<form method='post' action='CustomerViewOrdersPage.php'>";
						echo "<input type ='hidden' name = 'email' value = ".$_POST['email'].">";
						echo "<button class='btn btn-primary' type='submit'> View Orders </button>";
						echo "</form>";
					}
					
					if(isset($emailIn)){
						$_SESSION['email'] = $emailIn;
						echo "<form method='post' action='CustomerViewOrdersPage.php'>";
						echo "<input type ='hidden' name = 'email' value = ".$emailIn.">";
						echo "<button class='btn btn-primary' type='submit'> View Orders </button>";
						echo "</form>";
					}
				?> 
		</li>
		
		<li class="nav-item mx-2">
			<a href="logOut.php"> <button class="btn btn-primary"> Log Off </button> </a>
		</li>
    
	</ul>

</nav>

<div class="container">
  <div class="row">
    
	<div class="col-sm-4">
      
    </div>
	
	<div class="col-sm-4">
	</br></br>
	<h4 style="color: LightCoral"> Search Book </h4>
	  </br></br>
	        <form id="search" method="post" action="searchBookResults.php"> 

                <?php
					if(isset($_POST['email'])){
						echo "<input type ='hidden' name = 'email' value = ".$_POST['email'].">";
					}
					
					if(isset($emailIn)){
						echo "<input type ='hidden' name = 'email' value = ".$emailIn.">";
					}
				?> 		
			  
				  <span style="color: blue; font-weight: bold"> Search by book title:</span> <input type="text" name="bookTitle" size="50" placeholder= "Search book tilte"> 
				  <br><br>
				  <button type="submit" class="btn btn-success"> Search </button>
				  <br><br>
			</form>
            
			<form id="search" method="post" action="searchBookResults.php">

                <?php
					if(isset($_POST['email'])){
						echo "<input type ='hidden' name = 'email' value = ".$_POST['email'].">";
					}
					
					if(isset($emailIn)){
						echo "<input type ='hidden' name = 'email' value = ".$emailIn.">";
					}
				?> 
			
				  <span style="color: blue;font-weight: bold">Search by book ISBN:</span> <input type="text" name="bookISBN" maxlength="13" size="50" placeholder= "Search book ISBN"> 
				  <br><br>
				  <button type="submit" class="btn btn-success"> Search </button>
				  <br><br>
			</form>
            
			<form id="search" method="post" action="searchBookResults.php">	

                <?php
					if(isset($_POST['email'])){
						echo "<input type ='hidden' name = 'email' value = ".$_POST['email'].">";
					}
					
					if(isset($emailIn)){
						echo "<input type ='hidden' name = 'email' value = ".$emailIn.">";
					}
				?> 
			
				  <span style="color: blue;font-weight: bold">Search by author name:</span> <input type="text" name="authorName" maxlength="25" size="50" placeholder= "Search book author"> 
				  <br><br>
				  <button type="submit" class="btn btn-success"> Search </button>
				  <br><br>
			</form>	    
	  
	  </br></br>
    </div>
    
	<div class="col-sm-4">
      
    </div>
  </div>
</div>