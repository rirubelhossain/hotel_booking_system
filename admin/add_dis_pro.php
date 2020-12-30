<?php
	session_start();
	include 'function.php';
	$nameError = "";
	$_SESSION['nameError'] = test_input($_POST['name']);

	if($_SESSION['nameError']===""){
		$nameError = "Name is Required";
		$_SESSION['nameError'] = $nameError;
		header('location:add_dis.php');
		exit();
	}else{
			$name = test_input($_POST['name']);
			require "dataBaseConnection.php";
		    if(!$conn){
		    	die("Connection Error".mysqli_connect_error());
		    }
		    $sql = " INSERT INTO district (name) VALUES ('$name')";

		    if($conn->query($sql)===true){
		    	header('location:show_all.php');
		    	exit();
		    }else{
		    	echo "Error occar".$conn->error;
		    }
		    $conn->close();

	}
?>