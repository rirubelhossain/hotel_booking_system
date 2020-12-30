<?php
session_start();
if(!isset($_SESSION["adminlogin"])){
  header("Location: http://localhost/booking_hotel/login/login.php");
  exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.container {
	    margin-top: 7% ;
	    margin-left :15%: 

	}

	h1{
		border-bottom: 1px solid #441C1C;
		letter-spacing: 2px;
		color : #1A6B57;
	}
	label{
		font-family: "Times New Roman", Times, serif;
		letter-spacing: 2px;
		color: #6A1C1C;
		font-size: 25px;
	}
</style>
<body>

	<div class="container">
	  <h1>ADD NEW HOTEL</h1>
	  <form action="add_process.php" method="POST" enctype="multipart/form-data">
	    <div class="form-group">
	      <label for="name">Hotel Name <span style="color:red;">*</span></label>
	      <h2 style="color:red;"><?php
	       if(isset($_SESSION['nameError'])){
	         echo $_SESSION['nameError'];
	         unset($_SESSION['nameError']);
	       }	
	      ?></h2>
	      <input type="text" class="form-control" id="email" name="name">
	    </div>
	    <div class="form-group">
	      <label for="description">Description <span style="color:red;">*</span></label>
	      <h2 style="color:red;"><?php
	       if(isset($_SESSION['decError'])){
	         echo $_SESSION['decError'];
	         unset($_SESSION['decError']);
	       }
	      ?></h2>
	      <textarea class="form-control" rows="5" id="description" name="des"></textarea>
	    </div>

	    <div class="form-group">
	        <label for="exampleFormControlSelect1">District</label>
	        <select class="form-control" id="exampleFormControlSelect1" name="district">
	        	<?php
	        	    Require 'dataBaseConnection.php';
	        	    $sql = "SELECT name,id FROM district";
	        	    $result = mysqli_query($conn,$sql);
	        	    $rowNum = mysqli_num_rows($result);
	        	    $found = 1;
	        	       if($rowNum>0){
	        	       while($row = mysqli_fetch_assoc($result)){
	        	              $name = $row['name'];
	        	              $id = $row['id'];
	        	                 echo "<option>";
	        	                 echo $name;
	        	                 echo "</option>";
	        	                 $found++;
	        	          }    
	        	         mysqli_close($conn);
	        	      }
	        	?>
	        </select>
	      </div>

	    <div class="form-group">
	    	<label for="cover_image">Cover Image</label>
	    	<h2 style="color:red;"><?php
	    	 if(isset($_SESSION['imgError'])){
	    	   echo $_SESSION['imgError'];
	    	   unset($_SESSION['imgError']);
	    	 }
	    	?></h2>
	    	<input type="file" class="form-control-file" name="img">
	    </div>
	    <button type="submit" class="btn btn-primary btn-lg">ADD</button>
	  </form>
	</div>

</body>
</html>
