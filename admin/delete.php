<?php

	$id = $_GET['id'];

	$ID = $_GET['id'];

	$server = 'localhost';
	$dbuser ='root';
	$dbpass ='';
	$dbname ='hotel';

	$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
	if(!$conn){
		die("Connection Error".mysqli_connect_error());
	}


	/*
	 * Delete form local file
	 */
	$sql1 = "SELECT cover_image FROM hotel_info Where id = '$id' ";
	$res = mysqli_query($conn,$sql1);
	$name = mysqli_fetch_assoc($res);
	unlink($name["image"]);

	//die();
	/*
	 * Delete form Database
	 */
	$sql = " DELETE FROM hotel_info WHERE id='$id' "; 

	$result = mysqli_query($conn,$sql);
	if($result === true){
		header('location:show_all.php');
			exit();
	}
?>