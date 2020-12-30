<?php
	$server = 'localhost';
	$dbuser ='root';
	$dbpass ='';
	$dbname ='hotel';
	$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
		
	if(!$conn){
		die("Connection Error".mysqli_connect_error());
	}
	
?>