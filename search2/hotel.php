<?php
require_once ('db.php');
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
       
       
       
       
       
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>THis is a title</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        
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
  <link rel="stylesheet" href="../assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="../assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="../assets/tether/tether.min.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/dropdown/css/style.css">
  <link rel="stylesheet" href="../assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="../assets/socicon/css/styles.css">
  <link rel="stylesheet" href="../assets/theme/css/style.css">
  <link rel="stylesheet" href="../assets/mobirise-gallery/style.css">
  <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
        
        
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <script src="../assets/bootstrap/js/jquery-1.12.4.min.js"></script>
  <script src="../assets/bootstrap/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
        <style>
            body {
                background-color: darkkhaki;
            }
            #images {
                width: 90%;
            }
            #images img {
                width: 300px;
                height: 200px;
                float: left;
            }
            table {
                margin-left: 5%;
            }
            .hi {
                margin-bottom: 25px;
                height: 300px;
                width: 500px;
                margin-left: 6%;
            }
            nav {
                font-size: 1.05rem;
            }
            .modal-content {
                background-color: azure;
            }
        </style>
        
       
        
        
    </head>
<body>
    
    <section id="ext_menu-h">

    <nav class="navbar navbar-dropdown navbar-fixed-top" style="font-size: 1.05rem;">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand" style="margin-top: -50px;">
                        <a href="https://mobirise.com" class="navbar-logo"><img src="../assets/images/logo.png" alt="Mobirise"></a>
                        <a class="navbar-caption" href="https://mobirise.com">FIND &nbsp; CHOOSE &nbsp; STAY</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item"><a class="nav-link link" href="../index.php">HOME</a></li><li class="nav-item dropdown"><a href="search.php" class="nav-link link" href="search.php" aria-expanded="false">SEARCH</a></li><li class="nav-item"><a class="nav-link link" href="../contact.php">CONTACT</a></li><li class="nav-item"><a class="nav-link link" href="../about.php">ABOUT</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

               
                </div>
            </div>

        </div>
    </nav>

</section>

<?php
    $modal_no = 1;
        function foo(&$var, &$con, &$modal_no) {
         echo '
        <div id="myModal'.$modal_no.'" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" style="color: blue;">Room Details</h3>
              </div>
              <div class="modal-body">';
                $s = "SELECT * FROM `room_pic` WHERE room_no='".$var."'";
                $q = mysqli_query($con, $s);
                while($r = mysqli_fetch_assoc($q)){
                    echo "<em style='margin-left: 6%; font-size: 150%;'>".$r['img_details']."</em>";
                    echo "<img class='hi' src='".$r['path']."'>";
                }

        echo '
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
        ';
            
    }
    
    
    $name = $_GET['name'];
    $lower = $_GET['lower'];
    $upper = $_GET['upper'];
    $id = $_GET['id'];
    
    $modalNo = 1;
    
    $sql = "SELECT * FROM `hotel_details` WHERE id={$id}";
    $query = mysqli_query($con, $sql);
    echo "<br><br><br><br><br><br><br>";
    if(mysqli_num_rows($query)>0){
    $c  = 0;
        while ($row= mysqli_fetch_assoc($query)) {
            if($c==0)
            {
                echo "<table id='images'>";
            }
        $c++;
        if($c==3){
            echo "<br>";
            $c=0;
        }
            echo "<td style='color: black;'>Price: ".$row['price']."<br>";
            echo "<p>Room No: ".$row['room_no']."</p>";
               echo "<button type='button' data-toggle='modal' data-target='#myModal".$modalNo."'><img src='".$row['path']."' height='200' width='300'</img></button>
               <p><b>Room Facilities:</b><br>".$row['facilities']."</td>";
 
               $modalNo++;
            
               echo "        ";
            
            foo($row['room_no'], $con, $modal_no);
            $modal_no++;
            }
        echo "</table>";
    }
    
    $sql = "SELECT * FROM `hotel_address` WHERE Hotel_Id= {$id}";
    $q = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($q);
    echo "<br><br><br><br><br>";
    
            echo "<p style='text-align: center;'>Address: ".$row['address']."</p>";
            echo "<p style='text-align: center;'>Contact: ".$row['contact']."</p>";
            echo "<p style='text-align: center;'>Email:".$row['email']."</p></td>";
    
    ?>
    </body>
</html>

