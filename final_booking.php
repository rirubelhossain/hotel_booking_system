<!DOCTYPE html>
<html>
  <head>
    <title>Booking Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  </head>
  <body>
    <div class="container">
      <div class="row col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h3>Registration Form for Booking</h3>
          </div>
          <div class="panel-body">
            <form action="final_booking2.php" method="post">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="firstName">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="firstName"
                    name="firstName"
                    placeholder="First Name"
                    required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="lastName">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="lastName"
                    name="lastName"
                    placeholder="Last Name"
                    required
                  />
                </div>
              </div>

              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label for="male" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="m"
                      id="male"
                      required
                      
                    />Male</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                    />Female</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                    />Others</label
                  >
                </div>
              </div>

              <div class="form-group">
                  <label for="phone">Phone No</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone"
                    name="phone"
                    required
                    placeholder="Phone No"
                  />
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Email"
                />
              </div>

              <div class="form-group">
                <label for="email">Contact Information</label>
                <textarea name="contact_info" class="form-control" placeholder="Contact Information"> 
                </textarea>
              </div>

              <div class="form-group">

                <label>Select The Hotel</label>

                <select class="form-control" name="hotel_name">

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
                            $data = $data."<option value='".$row['Hotel_name']."'>".$row['Hotel_name']."</option>";
                          }

                          echo $data;
                          
                        }


                  ?>

                </select>
              
              </div>
              
              <input type="submit" value="Go For Availability"  class="btn btn-primary" />
              
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
