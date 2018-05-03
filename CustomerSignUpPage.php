<?php include 'top2.html';?>

<div class="container">
  <div class="row">
    
	<div class="col-sm-4">
      
    </div>
    
	<div class="col-sm-4" style = "background-color: LightBlue;">
	  </br></br>
	  
	  <h1 style="font-weight: bold; color: white; text-shadow:2px;">Sign Up </h1>	  
	    <br>
		<class="text-center">
		
		<form name = "signUp" action= "CustomerLoginPage.php" class="form-signin" method="post" onsubmit = "return signUpValidation();">
			
            <h6> Please fill in this form to create an account. </h6>			
			<hr>  
			
			<div style="text-align: left; padding-left: 50px">
			
				<span style = "font-weight: bold"> First Name </span>
				<input style="width: 80%; clear:both" type="text" placeholder="First name" name="Fname" required><br />
                <p id="fnameErr" style="color: red"> </p>
				
                <span style = "font-weight: bold"> Last Name </span>
				<input style="width: 80%; clear:both" type="text" placeholder="Last name" name="Lname" required><br />
                <p id="lnameErr" style="color: red"> </p> 
				 
                <span style = "font-weight: bold"> Email </span><br>
				<input style="width: 80%; clear:both" type="email" placeholder="Email" name="email" required><br />
                <br>                
				
                <span style = "font-weight: bold"> Phone </span><br>
				<input style="width: 80%; clear:both" type="text" placeholder="Phone number" name="phone" required><br />
                <p id="phoneErr" style="color: red"> </p> 
				 
                <span style = "font-weight: bold"> Address </span>
				<input style="width: 80%; clear:both" type="text" placeholder="Address" name="address" required><br />
                <br> 
				 
                <span style = "font-weight: bold"> Password </span>
				<input style="width: 80%; clear:both" type="password" placeholder="Password" name="password" required><br />
                <p id="passErr" style="color: red"> </p>
				
                <span style = "font-weight: bold"> Repeat Password </span>
				<input style="width: 80%; clear:both" type="password" placeholder="Repeat password" name="repassword" required><br />				
			    <p id="passErr" style="color: red"> </p>
			
			</div>  
			
			
			<div class="checkbox mb-3">
			<label>
			<input type="checkbox" value="remember-me"> Remember me
			</label>
		    </div>
		     
			<button class="btn btn-lg btn-block" type="submit">Sign up</button>
			  
			<br><p> Already have account? Sign in <a href = "CustomerLoginPage.php"><span style="color: blue; font-weight:bold;
			        font-size: 15pt"><u>here</u></span>.</a> </p>
		  
		    <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
		</form>
    </div>
    
	<div class="col-sm-4">
      
    </div>
  </div>
</div>
<script>
	
	function signUpValidation(){
		if (validateFname() == true &&
		    validateLname() == true &&
			validatePhone() == true &&
			validatePass() == true){
				return true;
		}
        else{
			return false;
		}			
	}
	
	function validatePhone(){
		var x = document.forms["signUp"]["phone"].value;
		if(x.length != 10){
			document.getElementById("phoneErr").innerHTML = "Phone number must be 10-digits long!"
			return false;
		}
		else if (allNum(x) == false){
			document.getElementById("phoneErr").innerHTML = "Phone number must be digits!"
			return false;			
		}
		else{
			document.getElementById("phoneErr").style.visibility = "hidden";
			return true;
		}
	}
	
	function validatePass(){
		var x = document.forms["signUp"]["password"].value;
		var y = document.forms["signUp"]["repassword"].value;
		if(x.length < 6){
			document.getElementById("passErr").innerHTML = "Password must be at least 6 chars long!";
			return false;			
		}
		else if(x != y){
			document.getElementById("passErr").innerHTML = "Repeated password must be the same as password above!";
			return false;
		}
		else{
			document.getElementById("passErr").style.visibility = "hidden";
			return true;
		}
	}
	
    function validateFname(){
		var x = document.forms["signUp"]["Fname"].value;
		if (allLetter(x) == false){
			document.getElementById("fnameErr").innerHTML = "First name must be letters!";
			return false;
		}
		else{
			document.getElementById("fnameErr").style.visibility = "hidden";
			return true;
		}
		
	}
	
	function validateLname(){
		var x = document.forms["signUp"]["Lname"].value;
		if (allLetter(x) == false){
			document.getElementById("lnameErr").innerHTML = "Last name must be letters!";
			return false;
		}
		else{
			document.getElementById("lnameErr").style.visibility = "hidden";
			return true;
		}
		
	}
	
	function allLetter(inputtxt){
	  	var x = inputtxt;
		var isletter = /^[A-Za-z]+$/.test(x);
		if (isletter == true){
			return true;
		}
		else{
			return false;
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
