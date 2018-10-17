<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once '../styles/boilerplate.php'?>
    <link rel="stylesheet" type="text/css" href="styles/wstyles.css">
</head>
<body>

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
                        <a class="btn btn-warning" a href="../hlogin/login.php">Login</a>
                        </li>
                    </ul>   
                  </div>
                </nav>

<div class="container mx-auto" style="width: 50%;border-radius: 12px;background-color: #EAEAEA;margin-top:10em;margin-bottom: 8em;height: 20em ;padding-left: 20px">
  <h1 class="display-4">Own a Restaurant?</h1>
  <p class="lead">This is a simple app which helps you to get tables bookings online with ease.</p>
  <hr class="my-4">
  <p>Create an account within minutes and start getting Orders in no time.</p>
  <a class="btn btn-primary btn-lg" href="../hsignup/signup.php" role="button">Register now</a>
</div>
<?php require_once '../styles/footer.php'?>
</body>
</html>