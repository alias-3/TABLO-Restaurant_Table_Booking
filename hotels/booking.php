<?php

    require('../config/config.php');
    require('../config/db.php');
    error_reporting(E_ERROR|E_PARSE);

    session_start();
    $cid = $_SESSION["cid"];
    //get hid 
    $hid = $_GET['hid'];
    $loginplease = "";



    date_default_timezone_set('Asia/Kolkata');
    $hr =  date('H').":00";
    $cut = substr($hr,0,2);
    //Query to display current running offers
    $query = "SELECT * FROM OFFERS where hid=$hid ORDER BY time";

    //fire the Query
    $result = mysqli_query($conn,$query);

    //fetch data
    $offers = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //after clicking Add button
    if(isset($_POST['book'])){

        if($_SESSION['user_logged_in']){     // check login
        $curpeople = mysqli_real_escape_string($conn,$_POST['curpeople']);
        $oid = mysqli_real_escape_string($conn,$_POST['radio-value']);
        $discount = mysqli_real_escape_string($conn,$_POST['discount']);
        $people = mysqli_real_escape_string($conn,$_POST['people']);
        $time = mysqli_real_escape_string($conn,$_POST['time']);
        $tdate = date('Y/m/d');

        //-----------UPDATE OFFER TABLE-------------//
        $res = mysqli_query($conn,"SELECT people from offers where oid = $oid;");
        $people1 = mysqli_fetch_all($res,MYSQLI_ASSOC);
        $npeople = $people1[0]['people'] - $people;
        
        
        if($npeople>=0){
        $query = "INSERT INTO bookings(date,cid,hid,time,discount,people) VALUES('$tdate','$cid','$hid','$time','$discount','$people');call updatepeople('$npeople','$oid');";
    

        if(mysqli_multi_query($conn,$query)){
        //go to thank you page
        echo "<script>alert('Booking done!');</script>";
        header('Location:thankyou.php');
        //      echo "<script>alert('Booking done!')</script>";
        }
        else{
            echo 'Error : ' . mysqli_error($conn);
        }
        }else{
            echo "<script>alert('All the seats are booked!!! only $curpeople left');</script>" ;
        }

    }
    else{
        $loginplease = "Please Login to Book a Table !!";
        //echo "<script>$(\"#loginModal\").modal('show');</script>" ; 
    }
    }

 /*   $query1 = "SELECT imagename FROM images where hid = '".$hid."'";
    $result1 = mysqli_query($conn,$query1);
    $count1 = mysqli_num_rows($result);
    if(!$count)
    {
        echo "no image";
    }
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once '../styles/boilerplate.php'?>
    <link rel="stylesheet" href="bstyles.css">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>


<body>
<?php require_once '../styles/header.php'?>
    <div class="container booking" style="margin-top: 50px!important;">
    <div class="main">
    <div class="row">
        <div class="col-md-8" style="padding: 30px">
            <div class="row">
                <div class="col-md-12">
                    <div id="hoteldes" style="padding-right: 20px"></div>        
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 30px">
                    <h5>Operating Hours</h5>
                    <table class="table table-hover" id="timingdes"></table>
                </div>
            </div>
        </div>   
        <div class="col-md-4">
        <div class="card" style="background-color: rgb(240, 239, 239);padding:30px; margin-top:50px;">
        <div class="row">
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
            <h4>No. of People</h4>
            <input class="form-control" type="number" name="people" min="2" max="12"><br>  
            <h4>Choose a Offer</h4>
            <div class="container">
                <div class="row radio-group" >
                <?php foreach($offers as $offer) : ?> 
                <?php $ot = substr($offer['time'],0,2); $nt = $cut + 1; 
                 if($ot == $nt && (date('i')<45)){ ?>
                <div onclick="loadDoc(<?php echo $offer['oid']; ?>)" class="col-md-3 sticker radio" data-value="<?php echo $offer['oid'];?>" data-discount="<?php echo $offer['discount'];?>" data-time="<?php echo $offer['time'];?>" data-people="<?php echo $offer['people'];?>">
                <p style=" margin-left:5px; margin-bottom:0px; font-size:19px;"><?php echo $offer['discount'];?><small>%</small>
                <p style="margin-left:6px; margin-top: 0px; font-size:11px;"><?php echo $offer['time'];?></p>
                </div>
                <?php }else if($ot>$cut && $ot !=$nt) { ?>   
                <div onclick="loadDoc(<?php echo $offer['oid']; ?>)" class="col-md-3 sticker radio" data-value="<?php echo $offer['oid'];?>" data-discount="<?php echo $offer['discount'];?>" data-time="<?php echo $offer['time'];?>">
                <p style=" margin-left:5px; margin-bottom:0px; font-size:19px;"><?php echo $offer['discount'];?><small>%</small>
                <p style="margin-left:6px; margin-top: 0px; font-size:11px;"><?php echo $offer['time'];?></p>
                </div>
                <?php } endforeach; ?>
                <input class="curpeople" type="hidden" id="radio-value" name="curpeople" />
                <input class="oid" type="hidden" id="radio-value" name="radio-value" />
                <input class="discount" type="hidden" id="radio-value" name="discount" />
                <input class="time" type="hidden" id="radio-value" name="time" />
                </div>
            </div>
            <div id="peopledes" ></div> <br>
            <input name="book" type="submit" value="BOOK" class="btn btn-primary"><br>
            <small style="color:red!important;"><?php echo $loginplease; ?></small>
            </form>
            </div>
            </div>
            <div class="row">
            <div class="card mx-auto" style="background-color: rgb(240, 239, 239);padding:30px; margin-top:50px; width: 90%;">
            <h4>Special Conditions</h4>
            <ul>
            <li>All promo & referral rewards for attended reservations only!</li>
            <li>Keep image of restaurant bill as proof of attendance to claim rewards.</li>
            <li>Table reservations are held for maximum of 30 minutes from the reservation time.</li>
            <li>Late arrivals may result to cancellation of booking.</li>
            <li>Tablo Discounts cannot be clubbed with any other in-house offers.</li>
            <li>Tablo Discounts are only valid on food and not on any kind of beverages.</li>
            <li>Only the number of seats reserved through tablo will be eligible for discounts.</li>
            </ul>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php require_once '../styles/footer.php';?>
</body>
</html>

<script>
$('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
    var val = $(this).attr('data-value');
    var val1 = $(this).attr('data-discount');
    var val2 = $(this).attr('data-time');
    var val3 = $(this).attr('data-people');
    //alert(val);
    //$(this).parent().find('input').val(val);
    $(this).parent().find('.oid').val(val);
    $(this).parent().find('.discount').val(val1);
    $(this).parent().find('.time').val(val2);
    $(this).parent().find('.curpeople').val(val3);
});
</script> 

<script>

var ajax = new XMLHttpRequest();
var method = "GET";
var url="hoteldes.php?hid=<?php echo $hid?>";
var async = true;
ajax.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
        document.getElementById("hoteldes").innerHTML = this.responseText;
       }}
ajax.open(method,url,async);
ajax.send();

//Hotel Timings
var ajax = new XMLHttpRequest();
var method = "GET";
var url="timingdes.php?hid=<?php echo $hid?>";
var async = true;
ajax.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
        document.getElementById("timingdes").innerHTML = this.responseText;
       }}
ajax.open(method,url,async);
ajax.send();

function loadDoc(oid) {
    //alert(oid);
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url= "peopledata.php?oid=" + oid;
    var async = true;
    ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
            document.getElementById("peopledes").innerHTML = this.responseText;
        }}
    ajax.open(method,url,async);
    ajax.send();
}
</script>