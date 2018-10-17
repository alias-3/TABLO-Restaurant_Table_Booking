<?php
require("../config/config.php");
require("../config/db.php");

$hid = $_GET['hid'];

$query = "SELECT * from hotel where hid= $hid;";
$result = mysqli_query($conn, $query);
$hotel = mysqli_fetch_all($result,MYSQLI_ASSOC);



if(isset($_POST['delete'])){
    $p = $hotel[0]['hphno'];
    //$del = "DELETE from hlogin where hphno = '$hotel[0]['hphno']';";
    $res1 = mysqli_query($conn,"DELETE from hlogin where hphno = $p");
    header('Location:hotels.php');
}

?>
<?php include('inc/header.php')?>
<style>

.jumbotron{
    background: #EAF0F1; 
    width: 50%;
    margin-top:4%;
    padding: 20px;
}
</style>
<div class="jumbotron mx-auto">
<h1 style="font-weight: 400;"><?php echo $hotel[0]['hname']; ?></h1>
<h3 style="font-weight: 200;">@ <?php echo $hotel[0]['hlocation']; ?></h3>
<small style="color: gray;"><?php echo $hotel[0]['hcategory']; ?></small><br>
<?php 
$res = mysqli_query($conn, "SELECT count(*) as cnt,avg(rating) as avg from bookings where hid= $hid;");
$rating = mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<small >Rating : <?php echo substr($rating[0]['avg'],0,3); ?> Stars and <?php echo $rating[0]['cnt'] ?> Reservations made till Date.</small>
<div style='text-align: center;margin:auto;'>
<img style="justify-content: center; border-radius: 12px; background-repeat: no-repeat;height:300px; width:500px; margin-bottom:20px; margin-top:10px;" src="../Dashboard/uploads/<?php echo $hid;?>.jpg" onerror="this.style.display='none'">
<img style="justify-content: center; border-radius: 12px; background-repeat: no-repeat;height:300px; width:500px; margin-bottom:20px; margin-top:10px;" src="../Dashboard/uploads/<?php echo $hid;?>.png" onerror="this.style.display='none'">
<img style="justify-content: center; border-radius: 12px; background-repeat: no-repeat;height:300px; width:500px; margin-bottom:20px; margin-top:10px;" src="../Dashboard/uploads/<?php echo $hid;?>.jpeg" onerror="this.style.display='none'">  
</div>
<p><?php echo $hotel[0]['hdescription']; ?></p>
<a style="text-decoration: underline;margin-top: 10px" href="hperformance.php?hid=<?php echo $hid;?>">See the Performance Chart for <?php  echo $hotel[0]['hname'];?></a>
<div class="mx-auto" style="width:100%; margin: 10px;">
<a class="btn btn-success" href="hotels.php">Back</a>
<form method="POST" style="float:right;" action="hdis.php?hid=<?php echo $hid; ?>">
<button type="submit" class="btn btn-danger" name="delete">Delete</button>
</form>
</div>
</div>
<?php include('inc/footer.php');?>