<?php
require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();
$errors=array();
$perror="";
$uerror="";
$eerror="";
$pherror="";
$passerror="";
//---------------------------------------------------------------------------------------------
$email_err = $name_err = $pass_err = $contact_err = "";
	$f = 1;
	if(filter_has_var(INPUT_POST, 'register_btn'))
	{
		if(isset($_POST["username"]) && isset($_POST["phno"]) && isset($_POST["confirmpass"]) && isset($_POST["password"]) && isset($_POST["email"]))
		{
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$name = mysqli_real_escape_string($conn,$_POST['username']);
			$contact = mysqli_real_escape_string($conn,$_POST['phno']);
			$password = md5(mysqli_real_escape_string($conn,$_POST['password']));
			$pass_confirm = md5(mysqli_real_escape_string($conn,$_POST['confirmpass']));
			$msg = "PASS";

			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				if(!(empty($name) || empty($email) || empty($contact) || empty($password) || empty($pass_confirm) ))
				{
					$email = filter_var($email, FILTER_SANITIZE_EMAIL);
					$website = strpos($website, 'http') !== 0 ? "https://$website" : $website;
					$website = filter_var($website, FILTER_SANITIZE_URL);
					
					if(!preg_match("/^[a-zA-Z ]*$/",$name)){
						$name_err = "name invalid";	$f = 0;
					}

					if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
						$email_err = "email not valid"; $f = 0;
					}

					if($password!=$pass_confirm){
						$pass_err = "passwords do not match";$f = 0;
					}

					if((strlen((string)$contact)==10) && (preg_match("/^[789]\d{9}$/",$contact)))
					{
						$query = "SELECT hphno FROM clogin WHERE hphno = '{$contact}'";
			   			$result = mysqli_query($conn,$query);
		   				$count = mysqli_num_rows($result);
		   				if($count)
		   				{
		   					$contact_err = "Contact already exists"; 
		   					$f=0;
		   				}
		   			}
		   			else{
							$contact_err = "invalid contact"; 
							$f=0;
					}

					if($f == 1){
						$query = "INSERT INTO clogin(cphno,cpassword) VALUES('$contact','$password');INSERT INTO customer(cusername,cphno,cemail) VALUES('$name','$contact','$email');";
						$result = mysqli_multi_query($conn,$query);
						if($result)
							header("Location:../");
						else
							echo "error during account creation";
						mysqli_close($conn);
					}

				}
				else
				{
					$msg = "*Please fill all details";
					$msgClass = 'alert-danger';
				}
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<?php require_once '../styles/boilerplate.php';?>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<?php require_once '../styles/header.php';?>
	<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-6">
	<div class="jumbotronsignup">
	<h1 class="display-5" style="font-weight:150;">Register</h1>
	<hr width="95%" style="border: solid white 0.3px;margin-left: 0">
	<form method="post" action="rform.php">
	<?php include('errors.php'); ?>	
			<div class="form-group"><label>Name:</label> * <?php echo $name_err; ?> <input type="text" name="username" class="form-control" placeholder="Enter your Name" required></div>
			<div class="form-group"><label>PhoneNumber:</label>  *<?php echo $contact_err;?> <input type="text" name="phno" class="form-control" placeholder="Phone Number"></div>
			<div class="form-group"><label>E-Mail Id:</label>  *<?php echo $email_err;?> <input type="text" name="email" class="form-control" placeholder="e-mail"></div>
			<div class="form-group"><label>Password:</label>  * <input type="Password" name="password" class="form-control" placeholder="Enter Password" value=""></div>
			<div class="form-group"><label>Confirm Password:</label>  * <?php echo $pass_err;?><input type="Password" name="confirmpass" class="form-control" placeholder="Confirm Password" value=""></div>
			<input type="submit" name="register_btn" value="Register" class="btn btn-info">
	</form>
	<p class="lead" style="margin-top:5px;">Already have an Account?<a href="../clogin/login.php">Login</a></div>
</div>
</div>
</div><?php require_once '../styles/footer.php';?>

</body>
</html>
