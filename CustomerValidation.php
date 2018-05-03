<?php
//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';
$cookie_name = 'user';
$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

$customerFname = false;
if(isset($_POST['inputCustomerEmail'])){
		//Email/Username
		$emailIn = mysqli_real_escape_string($db, $_POST['inputCustomerEmail']);

		//password
		$password = mysqli_real_escape_string($db, $_POST['inputPassword']);

		//Using email value passed by POST select user matching this email

		$sql = "SELECT * FROM customer WHERE Customer_Email='$emailIn' AND Password ='$password'";
		$sqlName = "SELECT Fname, Lname FROM customer WHERE Customer_Email='$emailIn'";
		//Query database
		$result = mysqli_query($db, $sql);
		$customerName = mysqli_query($db, $sqlName);
		//Get associated values
		$row = mysqli_fetch_assoc($result);
		$customerName = mysqli_fetch_assoc($customerName);

		$temppass = $row["Password"];
		$temEmail = $row["Customer_Email"];

		if($emailIn == $temEmail){
			$customerFname = $customerName['Fname'];
		}

        $dbEmail = $row["Customer_Email"];
		//Verify password, if it matches
		if ($password == $temppass && $emailIn == $temEmail){
			$_SESSION['customerEmail'] = $dbEmail;
			//header("Location:CustomerSearchPage.php");
			//If remember checkbox is selected
			if(isset($_POST['remember'])){
				//Create cookie for email
				setcookie($cookie_name,$emailIn,time()+84600*30);	
			}else{
				//Delete email cookie
				setcookie($cookie_name,'', time()-84600);
			}
		}
		//Otherwise return to index with a failure value set
		else
		{	
			header("Location: CustomerLoginPage.php");
			exit();
		}
}		
?>