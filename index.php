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
<html lang="en">
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
<body>
            
        <?php require_once 'header.php';?>    
                

        <div class="jumbotron" style="border-radius: 0;"><div id="heading">Dining out today?<br>Book a table at your favourite Restaurant</div></div>
              

                <!-- Featured Hotels Section -->
                <div class="container-fluid" id="featured" style="background-color: #F1F0F0;">
                <div class="container">
                <div class="row py-3">
                  <br><br>
                <div class="col-md-6" style="color:#6A6A6A"><h3>Featured Hotels</h3></div>
                <div class="col-md-6"><a href="hotels/hotelcard.php" class="btn btn-danger" style="margin-left:450px">View All</a></div>
                </div>
                      <div class="row">
                        <?php foreach($hotels as $hotel) : ?>    
                        <div class="col-md-3">
                        <div class="card" style="width: 16rem;">
                        <img class="card-img-top" src="Dashboard/uploads/<?php echo $hotel['hid'];?>.jpg" onerror="this.style.display='none'">
                        <img class="card-img-top" src="Dashboard/uploads/<?php echo $hotel['hid'];?>.png" onerror="this.style.display='none'">
                        <img class="card-img-top" src="Dashboard/uploads/<?php echo $hotel['hid'];?>.jpeg" onerror="this.style.display='none'">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $hotel['hname'];?></h5>
                        <small class="light"><?php echo $hotel['hcategory'];?></small>
                        <p class="card-text">@ <?php echo $hotel['hlocation'];?></p>
                        <a href="hotels/booking.php?hid=<?php echo $hotel['hid'];?>" class="btn btn-danger">Book Now</a>
                        </div>
                        </div>
                        </div>
                        <?php endforeach; ?>
                      </div>
                </div>
                <br><br><br><br>
              </div>
                <!-- Featured Hotels Section over -->
      <div style="margin-top: 3em;height: 15em;padding: auto">
      <img style="display: inline-block;" class="col-md-2 offset-md-2" src="images/add_user.png">
      <img style="display: inline-block;" class="col-md-1" src="images/forward.png">
      <img style="display: inline-block;" class="col-md-2" src="images/search.png">
      <img style="display: inline-block;" class="col-md-1" src="images/forward.png">
      <img style="display: inline-block;" class="col-md-2" src="images/checked.png">
      </div>
      <div style="background-color: #E7F4FE;height: 20em;padding:auto;">
          <div id="step" class="col-md-2 offset-md-2 ">Create an account...</div>
          <div id="step" class="col-md-2 offset-md-1">Choose your favorite hotel, offer and timing...</div>
          <div id="step" class="col-md-2 offset-md-1">Book.Done!!</div>    
      </div>

      <div class="partner container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div id="partnering1" style="background-color: rgba(0.7,0.7,0.7,0.5);width:500px;padding: 30px 30px 30px 30px;margin: 18vw 1.5em 1.5em 1.5em;border-radius: 5px ">
              <div style="font-size: 2em;color: white;">WHY?</div>
              <ul style="font-size: 2em;color: white;">
                <li>Boost your profits</li>
                <li>Grow your business</li>
                <li>Analyse your sales</li>
                <li>Let the world know you</li>
              </ul>
            </div>
          </div>

          <div class="col-md-6">
            <div id="partnering2" style="text-align:right;padding: 30px 50px 30px 30px;">Partner with us<br>
            <a href="Dashboard/welcome.php" class="btn btn-danger" style="font-size: 0.4em;border-radius: 5px">Join now</a>
            </div>
          </div>  
        </div>
      </div>
      
      <?php require_once 'styles/footer.php';?>
</body>
</html>
