<?php
require("../config/config.php");
require("../config/db.php");

session_start();
$hid = $_SESSION["aid"];

//$query = "SELECT * FROM bookings where time IN ('$hr','$hr1','$hr2') ORDER BY time";
$query = "SELECT hid,hname,hlocation,hphno from hotel order by hname"; 
$result = mysqli_query($conn,$query);
$hotels = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
<?php include('inc/header.php')?>
<style>
.scroll {
  width:80%;
  height:400px;
  overflow-y: scroll;
  overflow-x:hidden;
  border:1px solid gray;
  background:#DFDFDF;
}


html, body {
    max-width: 100%;
    overflow-x: hidden;
    overflow-y:hidden;
}

.message{
    text-align:center;
}

.message h1{
    font-size:80px;
    font-weight:100;
    margin-top:150px;
}
</style>    
<div class="container" style="margin: 40px">
<h1 style="font-weight:200;">Welcome to the Dashboard</h1>
<div class="scroll mx-auto" style="margin-top: 20px">
<?php if(mysqli_num_rows($result)){ ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">LOCATION</th>
      <th scope="col">NAME</th>
      <th scope="col">CONTACT</th>
      <th scope="col">DETAILS</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($hotels as $hotel) : ?>
    <tr>
      <td><?php echo $hotel['hid'];?></td>
      <td style="text-transform:uppercase;"><?php echo $hotel['hname'];?></td>
      <td><?php echo $hotel['hlocation'];?></td>
      <td>+91 <?php echo $hotel['hphno'];?></td>
      <td><a class="btn btn-warning" href="hdis.php?hid=<?php echo $hotel['hid'];?>">MORE INFO</a></td>
    </tr>
    <?php endforeach; ?> 
  </tbody>
</table>
<?php } else{ ?>
<div class="message"><h1 style="color:gray;">No Hotels :(</h1></div>
<?php } ?>
</div>
</div>

<?php include('inc/footer.php');?>