<?php
include 'db.php';

    if(isset($_POST['submit']))
    {
        //$name= $_POST['name'];
        $district = $_POST['district'];
        $upzilla = $_POST['upzilla'];
        $price = $_POST['price'];
        $upper=0;
        $lower=0;

     

        
        switch($price){

            case '0':
        
                $lower=0;
                $upper=1000;
                break; 
            case '1':
                $lower=1001;
                $upper=1500;
                break;
            case '2':
                $lower=1501;
                $upper=2000;
                break;
            case '3':
                $lower=2001;
                $upper=2500;
                break;
            case '4':
                $lower=2501;
                $upper=5000;
                break;
            default:
                break;
        }


       
     
$datas = array();
       
        $sql = "SELECT d.id AS id, d.name AS name,a.address,a.hotel_pic AS image,d.room_no,d.price AS price FROM hotel_address a, hotel_details d WHERE a.Hotel_ID = d.id AND a.Thana='{$upzilla}'
            AND d.price BETWEEN {$lower} AND {$upper}";
       


        $get_result=mysqli_query($con,$sql);

        while ($row = mysqli_fetch_assoc($get_result)) {
            $datas[]=  [
                'id' => $row['id'],
                'name' => $row['name'],
                'image' => $row['image'],
                'price' => $row['price']

            ];
        }

   
               

      





    }
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
        
        <style>
            #images {
                width: 90%;
            }
            #images img {
                width: 300;
                height: 200;
            }
            td a {
                text-decoration: none;
                color: blue;
            }
            body {
                background-color: rgb(159, 149, 142);
            }
        </style>
        
        
        <script type="text/javascript">
            var x = 0;
            function handle(element){
                window.location = "search.php?dist="+element.value;
                x = 1;
            }
            if(x == 1) {
                document.getElementById('just_an_id').show;
                x = 0;
            }
        </script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    
    <section id="ext_menu-h">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
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
   
   <section style="margin-top: 90px;">
       
   </section>
   
   
   
    
    
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search for Hotels" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg" aria-haspopup="true" aria-expanded ="true">
                            <button type="button"  class="dropdown-toggle btn-height" id="just_an_id" data-toggle="dropdown" style="height: 50px; width: 75px;"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form" method="post" action="">
                                  <div class="form-group">
                                    <label for="filter">DISTRICT</label>
                                    <select class="form-control" name="district" onchange="javascript: handle(this);">
                                       
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
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">UPAZILLA</label>
                                    <select class="form-control" name="upzilla">
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
                                  <div class="form-group">
                                    <label for="contain">PRICE RANGE</label>
                                    <select class="form-control" name="price">
                                        <option value="0" selected>500-1000</option>
                                        <option value="1">1000-1500</option>
                                        <option value="2">1500-2000</option>
                                        <option value="3">2000-2500</option>
                                        <option value="4">2500-3000</option>
                                    </select>
                                  </div>
                                  <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" style="height: 50px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
	</div>

       
       <div class="container">
        <?php
            if(isset($datas) && is_array($datas)){
                if(count($datas)>0){
                    foreach ($datas as $key => $value) {
                     

        ?>
            <table id='images'>
     
              <td><a href="hotel.php?<?php echo "id=".$value['id']. "&name=".$value['name']."&lower=".$lower."&upper=".$upper    ?>"><?php echo $value['name'];  ?></a><br> 
              <a href="hotel.php?<?php echo "id=".$value['id']. "&name=".$value['name']."&lower=".$lower."&upper=".$upper    ?>"><img src='<?php echo $value['image']; ?>' height='200' width='300'/></a></td>
            </table>  

        <?php
                }
            }
            else{
                echo '<h2 style="color:red">No result found</h2>';
            }
        
        }
        ?>              

        </div>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        
    </body>
</html>
