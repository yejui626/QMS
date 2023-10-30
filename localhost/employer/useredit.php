<?php include 'header.php'; 

if(isset($_GET['id']))
{
  $uid=$_GET['id'];
}

$sql="  SELECT * FROM tb_user WHERE u_userID= '$uid'";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
   ?>      
                     <!-- Column -->
                    <!-- Column -->


   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit User</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div><br>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

    <form class="form-horizontal" method="POST" action="edituserprocess.php">
<div class="container-fluid">
                    <div class="col-sm-12">
                         <p style="padding-bottom: 10px;">
                            <a class="btn btn-light" href="user.php" > 
                                <span><i class="fas fa-arrow-left" aria-hidden="true"></i></span>
                                <span class="hide-menu">Back To User</span></a>
                        </p>

                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">

                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">User ID</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="can't touch this" readonly  class="form-control p-0 border-0" name="userID" value="<?php echo $row['u_userID'];?>"required/>
                                                 
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Username</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" name="username" value="<?php echo $row['u_username'];?>" required />
                                             <?php 
                                             $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                            if(strpos($fullUrl,"usernameexist")==true){
                                           echo '<span style="color:red;"> Username has been used! </span>';
                                                     }
                                             ?> </div>
                                    </div>



                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" class="form-control p-0 border-0" name="email" value="<?php echo $row['u_email'];?>" required/>
                                                 <?php 
                                              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                if(strpos($fullUrl,"emailexist")==true){
                                                  echo '<span style="color:red;"> Email has been used! </span>';
                                                     }
                                                            ?>
                                        </div>
                                    </div>


                                    

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">User Type</label>
                                        <?php
                
                                        if($row['u_type'] == 1){
                                        echo '<select class="form-select shadow-none p-0 border-0 form-control-line" name="userType" class="form-control" id="inputUserType">';

                                     {

                                       echo" <option value='1' selected>admin</option>";
                                       echo" <option value='2' >employee</option>";
                                       echo" <option value='3'>customer</option>";
                                     
                                        
                                             }
                                              echo "</select>";
                                                }

                                        else if($row['u_type'] == 2){
                                        echo '<select class="form-select shadow-none p-0 border-0 form-control-line" name="userType" class="form-control" id="inputUserType">';

                                     {

                                       echo" <option value='1' >admin</option>";
                                       echo" <option value='2' selected>employee</option>";
                                       echo" <option value='3'>customer</option>";
                                     
                                        
                                             }
                                              echo "</select>";
                                                }

                                         if($row['u_type'] == 3){
                                        echo '<select class="form-select shadow-none p-0 border-0 form-control-line" name="userType" class="form-control" id="inputUserType">';

                                     {

                                       echo" <option value='1' >admin</option>";
                                       echo" <option value='2' >employee</option>";
                                       echo" <option value='3' selected>customer</option>";
                                     
                                        
                                             }
                                              echo "</select>";
                                                }
                                             ?>
                                    </div>





                                   
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type='button' class="btn btn-success" data-bs-toggle="modal" data-bs-target="#changepasswordModal">Change password</button>
                                          <br><br>
                                            <input type="submit" class="btn btn-success" name="signup_submit" id=submit value="Edit" required/><br>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>

                <script>
var check = function() {
   if (document.getElementById('password').value ==
    document.getElementById('password2').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password Match!';
    document.getElementById("submitcp").disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password Not Match!';
    document.getElementById("submitcp").disabled = true;
  }
}

</script>

         
<div class="modal fade" id="changepasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Change password</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="booking" class="section">
                <div class="section-center">
                  <div class="container">
                    <div class="row">
                      <div class="booking-form">
                        <form class="form-horizontal" method="POST" action="changepasswordprocess.php" id="formcp">
<div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                          
                                       
                                      

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">User ID</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="can't touch this" readonly class="form-control p-0 border-0" name="userID" id="userID"placeholder="" onkeyup="check();" value="<?php echo $row['u_userID'];?>"required/>
                                        </div>
                                    </div>

                                        <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" class="form-control p-0 border-0" name="password" id="password"placeholder="Password" onkeyup="check();" required/>
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Retype Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                             <input type="password" class="form-control p-0 border-0" name="password2" id="password2"placeholder="Retype password" onkeyup="check();" required />
                                                <span id="message"></span>
                                        </div>
                                    </div>

                                  


                                   
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-success" name="signup_submit" form="formcp" value="Change" required/><br>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>      


           <?php include 'footer.php'?>
