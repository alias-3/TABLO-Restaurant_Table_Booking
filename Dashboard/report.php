<?php
require("../config/config.php");
require("../config/db.php");

session_start();
$hid = $_SESSION['id'];
$stats = 0;
if(isset($_POST['getreport']))
{
    $_SESSION['$datef'] = mysqli_real_escape_string($conn,$_POST['from']);
    $_SESSION['$datet'] = mysqli_real_escape_string($conn,$_POST['to']);
    $datef = mysqli_real_escape_string($conn,$_POST['from']);
    $datet = mysqli_real_escape_string($conn,$_POST['to']);
    $stats = 1;
    //header('Location:reportpdf.php');
}    
?>
<?php include('inc/header.php')?>
    <style>
    .scroll {
        width:80%;
        height:400px;
        overflow-y: scroll;
        overflow-x:hidden;
        border:1px solid gray;
        background: white;
        }
    
    .jumbotron{
        width:25%;
        margin-top:7%;
        padding:2%;
    }
    body,html{
        overflow-y:hidden;
    }
    label{margin-left: 20px;}
    #datepicker,#datepickert{width:180px; margin: 0 20px 20px 20px;}
    #datepicker,#datepickert > span:hover{cursor: pointer;}
    </style>
    <div class="container" style="margin:40px">
    <?php if($stats == 0) { ?>
    <div class="jumbotron mx-auto">
    <h2 style="margin-bottom:10px; font-weight:200;">Generate Report</h2>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
    <label>From: </label>
    <div id="datepicker" class="input-group date" data-date-format="yyyy/mm/dd">
        <input class="form-control" name="from" type="text" readonly />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <label>To: </label>
    <div id="datepickert" class="input-group date" data-date-format="yyyy/mm/dd">
        <input class="form-control" name="to" type="text" readonly />
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
    <br>
    <input class="btn btn-success mx-4" name="getreport" type="submit" value="GET REPORT">
    </form>
    </div>
    <?php } else{
        
    $query = "SELECT b.bid,b.date,b.time,b.discount,b.people,b.status,c.cusername,c.cphno from bookings as b inner join customer as c on b.cid=c.cid where b.hid='$hid' AND (b.date BETWEEN '$datef' AND '$datet') order by date"; 
    $result=mysqli_query($conn,$query);?>
    <div class="mx-auto" style="width:80%; margin: 10px;">
    <a class="btn btn-info" href="report.php">Back</a>
    <a class="btn btn-success" href="reportpdf.php" target="blank" style="float:right;">Print</a>
    </div>
    <div class="scroll mx-auto">
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Bid</th>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Discount</th>
        <th scope="col">Seats</th>
        <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
    <?php while($data=mysqli_fetch_array($result)){
    $stat = ' '; 
    if($data['status']==0){$stat = "CANCELED";}else if($data['status']==2){$stat = "MISSED";}else if($data['status']==3){$stat = "COMPLETED";}else if($data['status']==1){$stat = "LIVE";}  ?>   
        <tr>
        <td><?php echo $data['bid'];?></td>
        <td><?php echo $data['cusername'];?></td>
        <td><?php echo $data['cphno'];?></td>
        <td><?php echo $data['date'];?></td>
        <td><?php echo $data['time'];?></td>
        <td><?php echo $data['discount'];?></td>
        <td><?php echo $data['people'];?></td>
        <td><?php echo $stat;?></td>
    </tr><?php } ?>
    </tbody>
    </table>
    </div>    
    <?php } ?>
</div>
    <?php include('inc/footer.php');?>

<script>
$(function () {
$("#datepicker").datepicker({ 
    autoclose: true, 
    todayHighlight: true
}).datepicker('update', new Date());
});

$(function () {
$("#datepickert").datepicker({ 
    autoclose: true, 
    todayHighlight: true
}).datepicker('update', new Date());
});
</script>