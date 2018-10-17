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
<div class="container" style="margin-top: 10em;height: 60vh">
  <h1 style="font-family: 'Sriracha',sans-serif;">TABLO</h1>
  <hr width="500px" style="margin-left: 0px">
  <div style="text-align: left;font-family: 'Roboto',sans-serif;font-size: 1.5em">
    Lorem ipsum dolor sit amet, per cu tota aliquip democritum. At cum prodesset liberavisse, est verear equidem comprehensam no, eu iisque assueverit sed. Ei nec odio aliquam definitiones, delectus percipit mel eu. Melius audire no eum, ut has illud complectitur, nec nostro oblique insolens in. Primis hendrerit vis ut, sea sint equidem partiendo ei. Usu id eros persequeris.
  </div>
  
</div>

<?php require_once 'footer.php'?>

</body>
</html>