<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  </head>
  <body>
    <div class="container">
      <div class="row col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h3>Choose date for Booking</h3>
          </div>
          <div class="panel-body">
            <form action="final_booking2.php" method="post">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="sdate">Start Date</label>
                  <input
                    type="date"
                    class="form-control"
                    id="sdate"
                    name="sdate"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="lastName">End Date</label>
                  <input
                    type="date"
                    class="form-control"
                    id="edate"
                    name="edate"
                    required
                    
                  />
                </div>
              </div>

              <div class="form-group">

                <label>Selected Hotel</label>

                <select class="form-control" readonly disabled >

                  <?php

                        $connection = mysqli_connect("localhost","root","","hotel");
                        $sql = "SELECT Hotel_ID, Hotel_name FROM hotel_address ORDER BY Hotel_name DESC";
                        $result = mysqli_query($connection, $sql);
                        $cnt = mysqli_num_rows($result);
                        if($cnt)
                        {
                          $data = "";
                          while($row = mysqli_fetch_assoc($result))
                          {
                            $data = $data."<option value='".$row['Hotel_ID']."'>".$row['Hotel_name']."</option>";
                          }

                          echo $data;
                          
                        }


                  ?>

                </select>
              
              </div>
              <p id="notification" style="color:green;"></p>
              <input type="submit" value="Submit Your Request"  class="btn btn-primary" />
              
            </form>
          </div>
          <div class="panel-footer text-right">
            <small>&copy; Rubel Hossain</small>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>

<?php

if(isset($_POST["phone"]))
{
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $contact_info = $_POST["contact_info"];
    $hotel_name = $_POST["hotel_name"];

    $_SESSION["firstName"]=$firstName;
    $_SESSION["lastName"]=$lastName;
    $_SESSION["gender"]=$gender;
    $_SESSION["phone"]=$phone;
    $_SESSION["email"]=$email;
    $_SESSION["contact_info"]=$contact_info;
    $_SESSION["hotel_name"]=$hotel_name;

}

?>

<?php
if(isset($_POST["sdate"]))
{
    $firstName = $_SESSION["firstName"];
    $lastName = $_SESSION["lastName"];
    $gender = $_SESSION["gender"];
    $phone = $_SESSION["phone"];
    $email = $_SESSION["email"];
    $contact_info = $_SESSION["contact_info"];
    $hotel_name = $_SESSION["hotel_name"];

    $sdate = $_POST["sdate"];
    $edate = $_POST["edate"];

    $connection = mysqli_connect("localhost","root","","hotel");

    $sql = "INSERT INTO `customer_booking` (`firstName`, `lastName`, `gender`, `phone`,`email`,`contact_info`,`hotel_name`, `sdate`, `edate`) VALUES ('$firstName', '$lastName', '$gender', '$phone','$email','$contact_info','$hotel_name','$sdate','$edate')";
    
    $result = mysqli_query($connection, $sql);
    if($result)
    {
        echo "<script> document.getElementById('notification').innerHTML='Successfully Requested, We will contact soon'</script>";
    }
    else
    {
        echo "<script> document.getElementById('notification').innerHTML='Sorry Try again'</script>";
    }

}

?>