<?php

include "conn.php";
function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
if($_POST['submit']=='register'){

	 $link    = Connect();
	$name    = $link->real_escape_string($_POST['username']);
	$email   = $link->real_escape_string($_POST['email']);
	$phone   = $link->real_escape_string($_POST['phone']);
	$password = $link->real_escape_string($_POST['password']);
	$cpassword =$link->real_escape_string($_POST['cpassword']);
	
	$nameErr = $emailErr = $phoneErr = $passwordErr =$cpasswordErr= "";
	$x = 0;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
			$x++;
		}else {
			$name = test_input($_POST["name"]);
		}
		
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
			$x++;
		}else {
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format"; 
			}
		}
		if (empty($_POST["phone"])) {
			$phoneErr = "phone is required";
			$x++;
		}
		else {
			$phone = test_input($_POST["phone"]);
		}
		if(empty($_POST["password"])){
            $passwordErr="password is required";
            $x++;
		}

		elseif($_POST["cpassword"]!=$_POST["password"])
		{
			$cpasswordErr="password doesn't match";
		}
		else{
			$password= test_input($_POST["password"]);
		}
	
		if ($x == 0) {

		$query   = "INSERT into register (name,email,phone,password) VALUES('" . $name . "','" . $email . "','" . $phone . "','" . $password . "')";
		$success = $link->query($query);
	}
		
	}
}
if($_POST['submit']=='login'){
  $link    = Connect();
    $name=$_POST['uname'];
    $password=$_POST['password'];
    $sql = "SELECT * FROM register  WHERE name='".$name."' and password='".$password."'";
        	$query = $link->query($sql);
        	
    
     if (mysqli_num_rows($query) != 0)
    {
     echo "login succssfully";   
      }
      else
      {
    echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
    }

}

?>
<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>	
<div id="users_login">

   <input class="login" type="radio" name="users_login" value="login" checked> Already have a account please login<br>
    <input class="guest" type="radio" name="users_login" value="Guest"> GUEST ,Without signup<br>
     <input class="register" type="radio" name="users_login" value="Register"> New user register<br><br>
</div>
 <div id="login">
  <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   

	  	<h1>Login </h1>
	  	 User name:<br>
	     <input type="text" name="uname">
	     <br>
	     Password:<br>
	     <input type="password" name="password"><br>
	      <input type="submit" name="submit" value="login">
   </form>
  </div>
 <div id="guest">
 	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input class="login" type="radio" name="users_guest" value="login" > Already have a account please login<br>
    <input class="guest" type="radio" name="users_guest" value="Guest"> GUEST ,Without signup<br>
    <input class="register" type="radio" name="users_guest" value="Register" checked> New user register<br><br>
   	  	<h1>Guest user</h1>
	  	 User name:<br>
	     <input type="text" name="username">
	     <br>
	     Phone:<br>
	     <input type="text" name="phone"><br>
	     Email:<br>
	     <input type="text" name="email"><br>
	     Address:<br>
	     <textarea name = "address" rows = "5" cols = "40"></textarea> <br>
	     <input type="submit" name="submit" value="Submit">
    </form>
 </div>
 <div id="register">
   	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   	<input class="login" type="radio" name="users_register" value="login" checked> Already have a account please login<br>
    <input class="guest" type="radio" name="users_register" value="Guest"> GUEST ,Without signup<br>
    <input class="register" type="radio" name="users_register" value="Register"> New user register<br><br>
   	  	<h1>Register </h1>
	  	<table>
					<tr>
						<td>Name:</td>
						<td>
							<input type = "text" name = "name">
							<span class = "error">*<?php echo $nameErr;?></span>
						</td>
					</tr>
					<tr>
						<td>E-mail: </td>
						<td><input type = "text" name = "email">
							<span class = "error">*<?php echo $emailErr;?></span>
						</td>
					</tr>
					<tr>
						<td>Phone No:</td>
						<td><input type = "text" name = "phone">
							<span class = "error">*<?php echo $phoneErr;?></span>
						</td>
					</tr>
					<tr>
						<td>password:</td>
						<td> <input type = "text" name = "password" ></textarea>
							<span class = "error">*<?php echo $passwordErr;?></span>
						</td>
					</tr>  
					<tr>
						<td>confirm password:</td>
						<td> <input type = "text" name = "cpassword" >
							<span class = "error">*<?php echo $cpasswordErr;?></span>
						</td>
					</tr>                           
					<td>
						 <input type = "submit" name = "submit" value = "register"> 
					</td> 
			    </table>
   	 </form>
 </div>
</body>
  <script type="text/javascript">
     $(document).ready(function(){
	      $("#guest").hide();
          $("#register").hide();
          $("#login").show();
    	$(".login").click(function(){
    		console.log(0);
          $("#guest").hide();
          $("#register").hide();
          $("#login").show();
        });
        $(".guest").click(function(){
        	console.log(1);
          $("#guest").css('display','block');
	      $("#register").hide();
	      $("#login").hide();
	    });
        $(".register").click(function(){
        	console.log(2);
	      $("#guest").hide();
	      $("#register").show();
	      $("#login").hide();
    	});
	  });
    </script>
</html>
