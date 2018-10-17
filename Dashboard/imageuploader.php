<?php


    require("../config/config.php");
    require("../config/db.php");

    session_start();
    $hid = $_SESSION["id"];

	

	if(isset($_POST['submit'])){
		
		$file=$_FILES['file'];//returns an Associative array


		$fileName = $file['name'];
		$fileType = $file['type'];
		$fileTmpName = $file['tmp_name'];
		$fileError = $file['error'];
		$fileSize= $file['size'];

		$fileExt = explode('.', $fileName);//breaks down the string in two parts
	
		$fileActExt = strtolower(end($fileExt));//makes the extension in lower case

		$allowed =array('png','jpeg','jpg');//this are allowed file extensions

		if(in_array($fileActExt, $allowed)){    //checks for the extension in array
			if($fileError === 0){				//error=0->file successfully uploaded
				if($fileSize < 8000000){		//size limit=8mb
					$fileNameNew =  $hid.".".$fileActExt;	  
					  

					$fileDestination = 'uploads/'.$fileNameNew;

                    move_uploaded_file($fileTmpName, $fileDestination); 
                    $query = "INSERT into images(hid,imagename) VALUES('$hid','$fileNameNew')";
                    $result = mysqli_query($conn,$query);
                    header('Location:imageuploader.php');                                         
					
				}else{
					echo "<script>alert(\"the file is too big\")</script>";
				}

			}else{
				echo "<script>alert(\"Error occured while uploading the file\")</script>";
			}
		}else{
			echo "<script>alert(\"cannot upload file of this extension\")</script>";
		}


		

	}


	
 ?>



<?php include('inc/header.php')?>
<div class="container" style="margin-top: 50px">
	<div class="container" style="margin-bottom: 40px;">
	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ;?>" enctype="multipart/form-data" >
		<!--enctype='multipart/form-data is an encoding type that allows files to be sent through a POST. Quite simply, without this encoding the files cannot be sent through POST. If you want to allow a user to upload a file via a form, you must use this enctype.-->
		<input type="file" name="file">
		<button type="submit" name="submit">submit</button>
	</form>
	</div>
	<div class="container">
	<img src="uploads/<?php echo $hid;?>.jpg" height="300px" width="500px" onerror="this.style.display='none'">
    <img src="uploads/<?php echo $hid;?>.png" height="300px" width="500px" onerror="this.style.display='none'">
    <img src="uploads/<?php echo $hid;?>.jpeg" height="300px" width="500px" onerror="this.style.display='none'">
	</div>


	
</div>
    <?php include('inc/footer.php');?>

