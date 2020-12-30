<?php
	session_start();
	 $ID = $_POST['id'];
	
	if($_FILES['img']['name']){
		$imgErr="";
		$name = $_FILES['img']['name'];
		$tmp_name = $_FILES['img']['tmp_name'];
		if(isset($name)){

			if(empty($name)){

				$imgErr = "please Select a Photo !";
				$_SESSION['imgError'] = $imgErr;
				header('location:edit.php?id='. urlencode($ID).'');
				exit();
			}
		else{

			$target_dir = "../uploads/";

			$target_file = $target_dir.basename($_FILES['img']['name']);
			$t = uniqid();
			$target_file = $target_dir.$t.basename($_FILES['img']['name']);

			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			$check = getimagesize($_FILES['img']['tmp_name']);
			if($check === false){

				$imgErr = "File in not a image!";
				$_SESSION['imgError'] = $imgErr;
				header('location:edit.php?id='. urlencode($ID).'');
				exit();

			}
			else if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"&& $imageFileType !== "gif"){

				$imgErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$_SESSION['imgError'] = $imgErr;
				header('location:edit.php?id='. urlencode($ID).'');
				exit();
			}
			 
			  	move_uploaded_file($tmp_name, $target_file);




			  	$updateImg = $target_file;
			  	Require 'dataBaseConnection.php';
                $sql = "SELECT cover_image FROM hotel_info WHERE id = '$ID' ";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $preImg = $row['cover_image'];
                // unlink($preImg);

		}
	}


	if($imgErr!==""){
		$_SESSION['imgErr'] = $imgErr;
		header("location:edit.php?id=$ID");
		exit();
	}
	}
	else{
		Require 'dataBaseConnection.php';
        $sql = "SELECT cover_image FROM hotel_info WHERE id = '$ID' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
		$updateImg = $row['image'];
		
	}

	$name = $_POST['name'];
	$des = $_POST['des'];
	$dis_name = $_POST['district'];

	Require 'dataBaseConnection.php';
	$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);	
	
	if(!$conn){
		die("Connection Error".mysqli_connect_error());
	}
	$sql = "SELECT id FROM district where name = '$dis_name' ";
	$result = mysqli_query($conn,$sql);
	$rowNum = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
	       // $name = $row['name'];
	       $id = $row['id'];
	   } 

	$sql = "UPDATE hotel_info SET name = '$name', description = '$des',cover_image = '$updateImg', District='$id' WHERE id ='$ID'";
	$result = mysqli_query($conn,$sql);
	
	if($result === true){
		header('location:show_all.php');
		exit();
	}

?>