<?php
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" >
  </head>
  <body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4" style="background-color: #515360; border-top:2px solid #07D2B9; margin:auto; margin-top:200px;" >
                <div class="container pt-3 pb-5" style="color:white;">
                    <form method="post" action="login.php">
                    
                        <h4 class="text-center">Admin Login</h4>

                        <div class="form-group">
                            <label for="youremail">Admin username</label>
                            <input  required class="form-control" name="username" id="youremail" type="text" placeholder="Enter your username" >
                        </div>

                        <div class="form-group">
                            <label for="yourpass">Admin password</label>
                            <input required class="form-control" name="password" id="yourpass" type="password" placeholder="your password" >
                        </div>

                        <div class="form-group">
                            <p id="notification" style="color:red;"></p>
                            <button type="submit" class="btn btn-info btn-block">
                                LOGIN
                            </button>

                        </div>

                    </form>

    
                
                </div>

            </div>
        </div>
    
    </div>

      
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php

    if(isset($_POST['username']))
    {
        $uname = $_POST["username"];
        $upass = $_POST["password"];

        $connection = mysqli_connect("localhost","root","","hotel");
        $sql = "SELECT * FROM admin_info WHERE uname='$uname' and upass= '$upass'";
        $result = mysqli_query($connection, $sql);
        $cnt = mysqli_num_rows($result);

        if($cnt){
            $_SESSION["adminlogin"] = $uname;
            echo "<script> document.getElementById('notification').innerHTML='Admin Recognized'</script>";
            echo "<script> window.location.href = 'http://localhost/hotel_booking_final/admin/'; </script>";
        }
        else{
            echo "<script> document.getElementById('notification').innerHTML='Admin Not Recognized'</script>";
        }



    }
?>