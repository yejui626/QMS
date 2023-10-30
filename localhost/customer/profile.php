<?php include 'header.php'; 

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl,"alert=successchange")==true){


    
     echo '<div class="col-lg-6">';
           echo '<div class="modal fade show" id="useraddedModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
           echo '<div class="modal-dialog">
                   
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>Password is successfully changed.</h3>
                  </div> 

                  <div class="modal-body text-center">

                        <a class="btn btn-primary btn-lg" href="profile.php">
                            Close
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>';
  }


$uid = $_SESSION['u_userID'];
$sql="  SELECT * FROM tb_user WHERE u_userID= '$uid'";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl,"alert=successedit")==true){
    
      echo '<div class="col-lg-6">';
           echo '<div class="modal fade show" id="useraddedModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
           echo '<div class="modal-dialog">
                   
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>User information Update Successfully!</h3>
                  </div> 

                  <div class="modal-body text-center">

                        <a class="btn btn-primary btn-lg" href="profile.php">
                            Close
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>';
  }
   ?>      
                     <!-- Column -->
                    <!-- Column -->


   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile information</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div><br>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

    
<div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="updateprofileprocess.php">

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
                                        <div class="col-sm-12">

                                           <button type='button' class="btn btn-success" data-bs-toggle="modal" data-bs-target="#changepasswordModal">Change password</button><br>


                                            <input type="submit" class="btn btn-success" name="signup_submit" id="submitform" value="Update"  required hidden/><br>

                                             
                                    <a class='btn btn-success' onClick='updateuser' type='button' title='Update User' data-bs-toggle='modal' data-bs-target='#update'><i aria-hidden='true'></i>Update</a>
                                    

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
               

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
                        <form class="form-horizontal" method="POST" action="changeprofilepasswordprocess.php" id="formcp">
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



 <!-- Modal Update?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you want to update your profile information?</h3>
              </div> 

              <div class="modal-body text-center">
                   
                    <label type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">
                        No
                    </label> 

                   <label for="submitform" class="btn btn-success btn-lg" tabindex="0" style="margin-right: 10px;">
                        Update
                    </label>
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

                    <script>
var check = function() {
   if (document.getElementById('password').value ==
    document.getElementById('password2').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password Match!';
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password Not Match!';
    document.getElementById("submit").disabled = true;
  }
}

</script>

<?php include 'footer.php'?>