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
    <a class="navbar-brand" href="managerPage.php"> Home </a>
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
            <a class="nav-link" href="logOut.php">Log Out</a>
          </li
    </ul>
  </nav>
</div>
</br>

<div class="container">
<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

if(isset($_POST['resupply'])){
	$queryInventory = mysqli_query($db, "SELECT Book_title, ISBN, Book_number FROM book") or die("Could not work!");
	echo "</br><center><h5> Book Inventory Summary </h5></center> </br>";		
	echo "<div style = 'margin: 0 auto;'>\n";
	echo "<center><table border = '1' style='border-color: white'>";
	echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> ISBN </th> 
		  <th style ='padding: 15px; text-align: center'> Book Number </th> </tr>\n";
    while($row = mysqli_fetch_assoc($queryInventory)){
			echo '<tr><td style ="padding: 15px; text-align: center">'.$row['Book_title'].'</td>';
			echo '<td style ="padding: 15px; text-align: center">'.$row['ISBN'].'</td>';
			if ($row['Book_number'] < 5){
				echo "<td style ='padding: 15px; text-align: center'>".$row['Book_number']."
				      <br><span style='color: red'> Book number below threshold! </span>
					  <form method = 'post' action = 'bookModify.php'>
					  <input type = 'hidden' name = 'bookISBN' value = ".$row['ISBN'].">
					  <br><button class='btn btn-primary' type = 'submit'> Modify </button></form></td>";
			}
			else{
				echo '<td style ="padding: 15px; text-align: center">'.$row['Book_number'].'</td>';	
			}
	}    
    echo "</table></center><br><br>";
    echo "</div>";	
}
?>

</div>
<br>
</body>
</html>