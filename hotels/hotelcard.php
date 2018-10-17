<?php
    require('../config/config.php');
    require('../config/db.php');
    error_reporting(E_ERROR|E_PARSE);
    session_start();
    $cid = $_SESSION['cid'];

    // create query
    $query = 'select hid,hname,hcategory,hlocation from hotel ORDER BY hlocation';

    //get results
    $result = mysqli_query($conn, $query);

    //fetch data
    $hotels = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //Free result
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once '../styles/boilerplate.php';?>
    <link rel="stylesheet" href="style.css">
    <title>Hotels</title>
</head>
<body>
<?php require_once '../styles/header.php';?>
<div style="color:#8A8A8A;font-size: 4em;margin-left: 50px;margin-top: 6vw;font-weight: bold;margin-bottom:0px">Explore...</div>
<div class="container rounded" style="margin-top: 2em">
    <a class="btn btn-success" href="../">Back</a>
    <div class="row">
    <?php foreach($hotels as $hotel) : ?>    
    <div class="col-md-4">
    <div class="card" style="width: 18rem;margin-top: 30px;margin-bottom: 30px">    
    <img class="card-img-top" src="../Dashboard/uploads/<?php echo $hotel['hid'];?>.jpg" onerror="this.style.display='none'">
    <img class="card-img-top" src="../Dashboard/uploads/<?php echo $hotel['hid'];?>.png" onerror="this.style.display='none'">
    <img class="card-img-top" src="../Dashboard/uploads/<?php echo $hotel['hid'];?>.jpeg" onerror="this.style.display='none'">
    <!-- <img class="card-img-top" src=".../100px180/" alt="Card image cap"> -->
    <!-- <div class="card-img-top"></div> -->
    <div class="card-body">
    <h5 class="card-title"><?php echo $hotel['hname'];?></h5>
    <small class="light"><?php echo $hotel['hcategory'];?></small>
    <p class="card-text">@ <?php echo $hotel['hlocation'];?></p>
    <a href="booking.php?hid=<?php echo $hotel['hid'];?>" class="btn btn-danger">Book a Table</a>
    </div>
    </div>
</div>
<?php endforeach; ?>
</div>
</div>
<?php require_once '../styles/footer.php';?>		 
</body>
</html>