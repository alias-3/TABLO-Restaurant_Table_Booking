<?php 

require('../config/db.php');
require('../config/config.php');
error_reporting(E_ERROR|E_PARSE);
$incorrect_err ="";
	
if(isset($_POST['submit'])){ 		//TO CHECK LOGIN BUTTON

if(empty($_POST['number']) || empty($_POST['password'])){  //THE FILEDS CANNOT BE EMPTY
echo "FILL ALL THE DETAILS".'<br>';
}

else{

$mobile=$_POST['number'];
$pass=$_POST['password'];

//$sql=" select * from hlogin where hphno='$mobile' AND hpassword = '$pass' ";  //QUERY
$sql="select h.hid from hotel as h INNER JOIN hlogin as hl ON h.hphno=hl.hphno where hl.hphno='$mobile' AND hl.hpassword = '$pass'";  //QUERY

$result=mysqli_query($conn,$sql);	//PERFORMS THE QUERY AGAINST THE DATABASE
									//RETURNS mysqli_result OBJECT ON TRUE ELSE FALSE

$count=mysqli_num_rows($result);  	//RETURNS NUMBER OF ROWS IN RESULT SET



if($count == 1)
{
	session_start();				//TO ACCESS THE DATA IN ANOTHER .PHP FILE
	$_SESSION['number']=$_POST['number'];
	$_SESSION['password']=$_POST['password'];
	$details = mysqli_fetch_array($result,MYSQLI_ASSOC);

		$_SESSION['id'] = $details['hid'];
	

	header("Location:../Dashboard/dashboard.php");	//REDIRECT TO SPECIFIED LOC:
}
else{
	$incorrect_err = "*ENTER CORRECT NUMBER OR PASSWORD".'<br>';

}
}
}
 ?>

<!DOCTYPE html> 
<html>
<head>
	<?php require_once '../styles/boilerplate.php'?>
	<link rel="stylesheet" href="styles.css">

</head>
<body style="background: url(../images/img6.jpeg) no-repeat 50% 50%; width: 100%;
  height: 100vh;">

		        <nav class="navbar navbar-expand-lg navbar-custom">
                  <a class="navbar-brand" href="../index.php">TABLO</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse">
                    <ul class="navbar-nav nav mr-auto">
                      <li style="padding: 15px"><a href="../about.php">About</a></li>
                      <li style="padding: 15px "><a href="../contact.php">Contact</a></li>
                    </ul>
                    <ul class="navbar-nav nav navbar-right">
                        <li class="reg_form">  
                        <a class="btn btn-primary" a href="../hsignup/signup.php">Signup</a>
                        </li>
                    </ul>   
                  </div>
                </nav>
	<div class="col-md-6 offset-md-6" style="margin-top: 10em;margin-bottom: 10em;">
	<div class="jumbotronlogin">
			<?php echo $incorrect_err?>
	<h1 class="display-5" style="font-weight:150;">Login</h1>

	<hr width="95%" style="border: solid white 0.3px;margin-left: 0">
	 <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Phone Number</label>
	    <input name="number" type="tel" class="form-control" id="exampleInputEmail1" placeholder="phone no">
	    </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <button type="submit" name="submit" class="btn btn-primary">Login</button>
	</form>
	<p class="lead" style="margin-top:5px;">Create an Account?<a href="../hsignup/signup.php">Register</a></p>
	</div>
	</div>

	<?php require_once'../styles/footer.php'?>
</body>
</html>