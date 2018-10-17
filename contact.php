<?php
//Date(H:i)
require('config/config.php');
require('config/db.php');

error_reporting(E_ERROR|E_PARSE);
session_start();
$cid = $_SESSION['cid'];


$query = 'select hid,hname,hcategory,hlocation from hotel where hid IN (16,18,14,1) ORDER BY hname';
$result = mysqli_query($conn, $query);
$hotels = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);

//close connection
mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
      body,html{
  width: 100% !important;
   margin: 0px !important;
  padding: 0px !important;
  overflow-x: hidden !important;
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sriracha" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="styles/hstyles.css">
    <link rel="stylesheet" type="text/css" href="styles/index_style.css">
    <title>TABLO</title>
</head>
<body style="height: 100%;width: 100%">
<?php require_once 'header.php'?>

<div class="container-fluid" style="margin-top: 10em;height: 100vh">
  <div class="row">
  <iframe class="col-md-8" style="display: inline-block;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.2387490538836!2d73.81363291404456!3d18.518110124084586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bfa2515ce741%3A0x349ddf824466170d!2sMIT+College+of+Engineering%2C+Rambaug+Colony%2C+Kothrud%2C+Pune%2C+Maharashtra+411038!5e0!3m2!1sen!2sin!4v1539074772386" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  <div class="col-md-4"><br><br><div style="display: inline-block;"><a style="color:#B0B0B0; font-size: 2em" href="tel:1234567890">1234567890</a></div><a href="tel:1234567890" style="display: inline-block;" class="fa fa-phone col-md-4"></a><br><br><div>Email : tablo@mitcoe.com</div></div>
  </div>
</div>

<?php require_once 'footer.php'?>

</body>
</html>