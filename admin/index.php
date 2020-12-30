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
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
    <style type="text/css">
      .container{
          margin: 20% 20%;
      }
      h2{
        margin-top:-10%;
        letter-spacing: 2px;
        font-size: 300%;
        color: #800000;
      }
      .btn{
        letter-spacing: 2px;
        margin-left: 20px;
      }
      .con{
        border-left: 2px solid green;
        /*border-top: 2px solid green;*/
      }
    </style>
<body>

<div class="container">
    <h2>WelCome To Admin Panel</h2>
    <br><br>
    <div class="con">
      <a href="add_hotel.php" class="btn btn-info" role="button">ADD HOTEL</a>
      <br><br>
      
      <a href="add_dis.php" class="btn btn-secondary" role="button">ADD DISTRICT</a>
      <br> <br>

      <a href="show_all.php" class="btn btn-primary" role="button">SHOW HOTEL LIST</a>
      <br> <br>
    </div>
   <!--  <button type="button" class="btn btn-danger">DELETE HOTEL</button>
    <input type="button" class="btn btn-info" value="Input Button">
    <input type="submit" class="btn btn-info" value="Submit Button"> -->
</div>

</body>
</html>