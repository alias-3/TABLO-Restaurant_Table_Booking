<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

require('../config/config.php');
require('../config/db.php');

//get hid 
$hid = $_GET['hid'];
    
// create query
//$query = 'SELECT h.hid,h.hname,ht.day,ht.status from hotel as h inner join hoteltime as ht on h.hid=ht.hid where h.hid=$hid';
$query = "SELECT * from hotel where hid='$hid' limit 1";
//get results
$result = mysqli_query($conn, $query);

//fetch data
$hotel = mysqli_fetch_all($result,MYSQLI_ASSOC);

$res = mysqli_query($conn, "SELECT count(*) as cnt,avg(rating) as avg from bookings where hid= $hid;");
$rating = mysqli_fetch_all($res,MYSQLI_ASSOC);

echo '<a href="hotelcard.php" class="btn btn-success">Back</a>';
echo "<hr>";
echo "<h2 style='font-family: \"Righteous\", cursive;'>" . $hotel[0]['hname'] . "</h2>";
echo "<h3 style='font-weight:200;'>@ " . $hotel[0]['hlocation'] . "</h3>";
echo "<small style=\"color:gray;\">" . $hotel[0]['hcategory'] . "</small><br>";
echo "<small >Rating " . substr($rating[0]['avg'],0,3) . " Stars and " . $rating[0]['cnt'] . " Reservations made till Date.</small>";
echo "<hr>";
echo "<div style='text-align: center;margin:auto;'>";
echo '<img style="justify-content: center; border-radius: 12px; background-repeat: no-repeat;height:300px; width:500px; margin-bottom:20px;" src="../Dashboard/uploads/'.$hotel[0]['hid'].'.jpg" onerror="this.style.display=\'none\'">';
echo '<img style="justify-content: center; border-radius: 12px; background-repeat: no-repeat;height:300px; width:500px; margin-bottom:20px;" src="../Dashboard/uploads/'.$hotel[0]['hid'].'.png" onerror="this.style.display=\'none\'">';
echo '<img style="justify-content: center; border-radius: 12px; background-repeat: no-repeat;height:300px; width:500px; margin-bottom:20px;" src="../Dashboard/uploads/'.$hotel[0]['hid'].'.jpeg" onerror="this.style.display=\'none\'">';    
echo '</div>';
echo "<p style='font-weight:400;'>" . $hotel[0]['hdescription'] . "</p>";


?>
</body>
</html>



