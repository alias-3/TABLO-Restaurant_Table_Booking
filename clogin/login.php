<?php 

require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
session_start();

	
if(isset($_POST['submit'])){ 		//TO CHECK LOGIN BUTTON CLICK

if(empty($_POST['number']) || empty($_POST['password'])){  //THE FILEDS CANNOT BE EMPTY
echo "FILL ALL THE DETAILS".'<br>';
}

else{

$mobile=$_POST['number'];
$pass=md5($_POST['password']);
//$sql=" select * from clogin where cphno='$mobile' AND cpassword = '$pass' ";  //QUERY
$sql="select c.cid from customer as c INNER JOIN clogin as cl ON c.cphno=cl.cphno where cl.cphno='$mobile' AND cl.cpassword = '$pass'";

$result=mysqli_query($conn,$sql);	//PERFORMS THE QUERY AGAINST THE DATABASE
									//RETURNS mysqli_result OBJECT ON TRUE ELSE FALSE

$count=mysqli_num_rows($result);  	//RETURNS NUMBER OF ROWS IN RESULT SET



if($count)
{
				//TO ACCESS THE DATA IN ANOTHER .PHP FILE
	$_SESSION['number']=$_POST['number'];
	$_SESSION['password']=$_POST['password'];
	$details = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$_SESSION['cid'] = $details['cid'];
		$_SESSION['user_logged_in'] = true;
	

	header('location:'.ROOT_URL.'');	//REDIRECT TO SPECIFIED LOC:
}
else{
	$error = "ENTER CORRECT NUMBER OR PASSWORD".'<br>';

}
}
}
 ?>


<!DOCTYPE html>
<html>
	<head>
		<?php require_once '../styles/boilerplate.php'; ?>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php require_once '../styles/header.php'; ?>
		<div class="cover">
		<div class="row">
		<div class="col-md-6 offset-md-6">
		<div class="jumbotronlogin">
			<div><?php if($count!=1): echo $error; endif ?> </div>
			<h1 class="display-5" style="font-weight:150;">Login</h1>
			<hr width="95%" style="border: solid white 0.3px;margin-left: 0">
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Phone Number</label>
			    <input name="number" type="tel" class="form-control" id="exampleInputEmail1" placeholder="phone number">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <button type="submit" name="submit" class="btn btn-primary">Login</button>
			  <p class="lead" style="margin-top:5px;">Create an Account?<a href="../csignup/rform.php">Register</a>
			</form>
		</div>
		</div>
		</div>
		</div>
		</div>	
		<?php require_once '../styles/footer.php'; ?>	 
	</body>
</html>