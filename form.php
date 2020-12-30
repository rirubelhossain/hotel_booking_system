<?php
    require_once('db.php');
?>


<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $dist = $_POST['district'];
        $upzilla = $_POST['upzilla'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $facilities = $_POST['facilities'];
        $path = $_POST['path'];
        
        $sql = "INSERT INTO `hotel address` (`Hotel_ID`, `Hotel_name`, `District`, `Thana`, `address`, `contact`, `email`, `fascilities`, `hotel_pic`) VALUES (NULL, '$name', '$dist', '$upzilla', '$address', '$contact', '$email', '$facilities', '$path')";
        $q = mysqli_query($con, $sql);
        
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    
            <script src="https://use.fontawesome.com/1eae1dea35.js"></script>

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/slicknav.scss">

        <link rel="stylesheet" href="css/font-awesome.min.css">

        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
   
     <style>
      body {
            background-color: #39afef;
          
</style>
    
    <link rel="stylesheet" href="form.css">
    <style>
        body {
            width: 100%;
            margin-left: 30%;
            margin-top: 5%;
        }
    </style>
      <script type="text/javascript">
            function handle(element){
                window.location = "form.php?dist="+element.value;
            }
        </script>
</head>
<body>
    <div class="container">
	<div class="row">
    <div class="col-md-4">
		<div class="form_main">
                <h4 class="heading"><strong>Quick </strong> Contact <span></span></h4>
                <div class="form">
                <form action="" method="post" id="contactForm" name="contactForm">
                    
                  <select class="form-control" name="district" class="txt" onchange="javascript: handle(this);">
                                       
                                        <?php
                                        if(!isset($_GET['dist'])){
                                            echo "<option value='Select A District'>Select A District</option>";
                                            
                                                
                                        } else {
                                            echo "<option value='".$_GET['dist']."' selected>".$_GET['dist']."</option>";
                                        }
                                        $sql = "SELECT DISTINCT district_upazilla.District FROM `district_upazilla` ORDER BY district_upazilla.District";
                                        $query = mysqli_query($con, $sql);

                                            while($row = mysqli_fetch_assoc($query)){
                                                if($row['District'] != $_GET['dist'])
                                                    echo "<option value='".$row['District']."'>".$row['District']."</option>";
                                                    
                                            }
                                        ?>
                                        
                                    </select>
                                    <br>
                            <div class="form-group">
                            <select class="form-control" name="upzilla" class="txt">
                               <?php
                               if(isset($_GET['dist'])){
                                   $sql = "SELECT `Upzilla` FROM `district_upazilla` WHERE `District` = '".$_GET['dist']."' ORDER BY Upzilla";
                                   $query = mysqli_query($con, $sql);

                                   while($row = mysqli_fetch_assoc($query)){
                                        echo "<option value='".$row['Upzilla']."'>".$row['Upzilla']."</option>";
                                   }  
                               }
                                else{
                                    echo "<option value='Select A district First'>Select A District First</option>";
                                }
                                ?>
                            </select>
                          </div>
                    <input type="text" placeholder="Please input hotels Name" value="" name="name" class="txt" required>
                                  
                    <input type="text" placeholder="Please input Address" value="" name="address" class="txt" required>
                    <input type="text" placeholder="Please input Contact" value="" name="contact" class="txt" required>
                    <input type="text" placeholder="Please input your Email" value="" name="email" class="txt" required>
                    <input type="text" placeholder="Please input your Facilities" value="" name="facilities" class="txt" required>
                    <input type="file" name="path">
                    
                    <input type="submit" value="submit" name="submit" class="txt2">
                </form>
            </div>
            </div>
        </div>
	</div>
</div>
</body>
</html>