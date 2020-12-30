<?php
	session_start();
	include 'function.php';
	$nameError = $decError = $imgError = $disError = "";
	$_SESSION['nameError'] = test_input($_POST['name']);
	$_SESSION['decError'] = test_input($_POST['des']);
	// $_SESSION['disError'] = test_input($_POST['dis']);
	$dis_name = $_POST['district'];

	if($_SESSION['nameError']===""){
		$nameError = "First Name is Required";
		$_SESSION['nameError'] = $nameError;
	}
	else{
		$_SESSION['nameError'] = "";
		$hotel_name = test_input($_POST['name']);
	}

	if($_SESSION['decError']===""){
		$decError = "Description is Required";
		$_SESSION['decError'] = $decError;
	}
	else{
		$_SESSION['decError'] = "";
		$hotel_des = test_input($_POST['des']);
	}
	

	// isn't upload a image 

	$name = $_FILES['img']['name'];
	$tmp_name = $_FILES['img']['tmp_name'];
	if(isset($name)){

		if(empty($name)){

			$imgError = "please Select a Photo !";
			$_SESSION['imgError'] = $imgError;
			header('location:add_hotel.php');
			exit();
		}

		else{

			$target_dir = "../uploads/";
			$t = uniqid();
			$img_name = $t.basename($_FILES['img']['name']);
			$target_file = $target_dir.$t.basename($_FILES['img']['name']);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			$check = getimagesize($_FILES['img']['tmp_name']);
			if($check === false){

				$imgError = "File in not a image!";
				$_SESSION['imgError'] = $imgError;
				header('location:add_hotel.php');
				exit();

			}

			else if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"&& $imageFileType !== "gif"){

				$imgError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$_SESSION['imgError'] = $imgError;
				header('location:add_hotel.php');
				exit();
			}

			if (!file_exists('/xampp/htdocs/project/'.$target_dir)){
			    mkdir('/xampp/htdocs/project/'.$target_dir);
			}
			 
			 move_uploaded_file($tmp_name, $target_file);
	
		}
	}


	if($nameError!=="" || $decError !=="" || $imgError!==""){

		header('location:add_hotel.php');
		exit();
	}
	else{
	require "dataBaseConnection.php";
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
    $sql = " INSERT INTO hotel_info (name, description, cover_image,District) VALUES ('$hotel_name', '$hotel_des', '$img_name','$id');";

    if($conn->query($sql)===true){
    	header('location:show_all.php');
    	exit();
    }else{
    	echo "Error occar".$conn->error;
    }
    $conn->close();
	}
?>