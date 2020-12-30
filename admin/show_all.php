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
  <title>Show ALL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <br>
    <br>
    <br>
    <h2> ALL THE HOTEL LIST </h2>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Hotel _Name</th>
          <th scope="col">option</th>
        </tr>
      </thead>
      <tbody>
          <?php
              Require 'dataBaseConnection.php';
              $sql = "SELECT name,id FROM hotel_info";
              $result = mysqli_query($conn,$sql);
              $rowNum = mysqli_num_rows($result);
              $found = 1;
                 if($rowNum>0){
                 while($row = mysqli_fetch_assoc($result)){
                        $name = $row['name'];
                        $id = $row['id'];
                          echo "<tr>";
                          echo "<td style='font-family: Times New Roman; font-size:150%;'>".$found."</td>";
                           echo "<td style='font-family: Times New Roman; font-size:150%;'>".$row['name']."</td>";
                           echo "<td style='font-family: Times New Roman; font-size:150%;'>".'<a href="edit.php?id='. urlencode($id).'">'.'EDIT'.'</a>'.'<br>'.'<a href="delete.php?id='. urlencode($id).'">'.'DELETE'.'</a>'."</td>";
                           echo "</tr>";
                           $found++;
                    }    
                   mysqli_close($conn);
                }
          ?>
      </tbody>
    </table>
  </div>

</body>
</html>
