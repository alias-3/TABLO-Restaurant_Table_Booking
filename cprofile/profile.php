<?php 
	require('../config/db.php');
	require('../config/config.php');
	session_start();
	$cid = $_SESSION['cid'];
	//$query = "SELECT bid,hid,date,time,rating FROM bookings WHERE cid = '{$cid}' and time < CURTIME() ORDER BY date DESC";
	$query = "SELECT bid,hid,date,time,rating FROM bookings WHERE cid = '{$cid}' and status IN(0,2,3);";
	$result  = mysqli_query($conn,$query);
	$num = mysqli_num_rows($result);

	//$query1 = "SELECT bid,hid,date,time,rating FROM bookings WHERE cid = '{$cid}' and time >= CURTIME() ORDER BY date DESC";
	$query1 = "SELECT bid,hid,date,time,rating FROM bookings WHERE cid = '{$cid}' and status = 1";
	$result1  = mysqli_query($conn,$query1);
	$num1 = mysqli_num_rows($result1);




?>

<!DOCTYPE html>
<html>
<head>
	<?php require_once '../styles/boilerplate.php' ?>
	 	<style>
			.fa-star{
		 		color: #939393;
		 		font-size: 20px;
		 		outline-color: black
		 	} 

		 	.rate-hover{
		 		cursor: pointer;
		 		color: #094D7A;
		 	}
		 	.rate-chosen{
		 		color:#BDFF00 ;
		 	}

		 	.tab-elm{
		 		margin-left:10em;
		 	}
	 	</style>
	 	<script>
	 	$(function(){
	 		$('.cancel').on('click',function(){
	 			var bid = $(this).attr("id");
	 			$.ajax({
      					type : "POST",
      					url : "ajaxcancel.php",
      					data: {v0 : bid},      					
      					success: function (status) {
      						if(status==1)
      						{
      							alert("Successfully cancelled your booking!");
      							location.reload();
      						}
      						else
      							alert("failed");
      					}
    			});
	 		})

	 		$('.fa-star').on({
	 			mouseenter:function(){			
	 				$(this).addClass('rate-hover').prevUntil('rating-container').addClass('rate-hover');
	 			},
	 			mouseleave:function(){
	 				$(this).removeClass('rate-hover').prevUntil('rating-container').removeClass('rate-hover');

	 			},
	 			click:function(){
	 				var rating = $(this).attr('id');
      				var id = $(this).parent().attr("class");	 				
	 				$(this).removeClass('rating-chosen').nextUntil('end').removeClass('rate-chosen').prevUntil('rating-container').removeClass('rate-chosen');
	 				$(this).addClass('rate-chosen').prevUntil('rating-container').addClass('rate-chosen');
	 				$.ajax({
      					type : "POST",
      					url : "ajax.php",
      					data: {v1 : id, v2 : rating},      					
      					success: function () {}
    				});
	 			}
	 		});
 		})
 	</script>
</head>


<body style="background: url(../images/prof2.jpg);">
	<?php require_once '../styles/header.php'; ?>
	<div class="container" style="margin-top: 7em; background: #F0F0F0;border-radius: 13px;opacity: 0.8;padding:60px">
		<h1 style="color:#939393">Upcoming Orders: </h1>
			
			<?php if($num1== 0): ?>
			<div class="container">
				<h4>No New Orders to show! </h4>
			</div>
			
			<?php else: ?>
			<div class="container">
			<table class="table table-hover">
				<tr>
					<th>Booking id</th>
					<th>Hotel</th>
					<th>Time</th>
					<th>Status</th>
				</tr>	
			<?php while($row1 = mysqli_fetch_assoc($result1)){  ?>
			<div class="container content" style="'background-color: blue;color: white">
				<tr>		
					<td><div id="tab-elm"><?php echo $row1["bid"];?></div></td>
					<td><div id="tab-elm" ><?php $hotel1 = mysqli_query($conn,"SELECT hname FROM hotel WHERE hid = '{$row1["hid"]}'"); $hot = mysqli_fetch_assoc($hotel1);echo $hot["hname"]; ?></div></td>
					<td><div id="tab-elm"><?php echo $row1["time"];?></div></td>
					<td><button id="<?php echo $row1["bid"] ?>" class="cancel btn btn-danger">Cancel</button></td>
				</tr>
			</div>
		
			<?php  }?>
			<?php endif; ?>
			</table>
			</div>
	</div>
<!-------------------------------------------------------------------------------->
	<div class="container" style="margin-top: 2em;margin-bottom: 5em; background: #F0F0F0;border-radius: 13px;opacity: 0.8;padding:60px">	
		<h1 style="color:#939393">Previous Orders:</h1> 
		
		<?php if($num== 0): ?>
		<div class="container">
			<h4>No Previous Orders to show! </h4>
		</div>
		
		<?php else: ?>
		<div>
		<table class="table table-hover">
		<tr>
			<th>Booking id</th>
			<th>Hotel</th>
			<th>Date</th>
			<th>Rating</th>
		</tr>	
		<?php while($row = mysqli_fetch_assoc($result)){  ?>
			<div class="container content" style="'background-color: blue;color: white">
				<tr>		
					<td><div id="tab-elm"><?php echo $row["bid"];?></div></td>
					<td><div id="tab-elm" ><?php $hotel = mysqli_query($conn,"SELECT hname FROM hotel WHERE hid = '{$row["hid"]}'"); $hot = mysqli_fetch_assoc($hotel);echo $hot["hname"]; ?></div></td>
					<td><div id="tab-elm"><?php echo $row["date"]."[".$row["time"]."]";?></div></td>
					<td><div id="rating-container" class="<?php echo $row["bid"]; ?>">
				  	<i id="1" class="fa fa-star"></i>
				  	<i id="2" class="fa fa-star"></i>
				  	<i id="3" class="fa fa-star"></i>
				  	<i id="4" class="fa fa-star"></i>
				  	<i id="5" class="fa fa-star"></i>
				  	<i class="end"></i>
				 	</div>
				 	</td>
			 	</tr>
			 </div>
		<?php  }?>
		<?php endif; ?>
		</table>
		</div>
	</div>
<?php require_once '../styles/footer.php';?>
</body>
</html>