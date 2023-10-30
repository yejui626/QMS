<?php include 'header.php'; ?> 


         
                    <!-- Column -->
                    <!-- Column -->


   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add User</h4>
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
                                <form class="form-horizontal" method="POST" action="adduserprocess.php">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Username</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" name="username" placeholder="Username" required />
                                             <?php 
                                             $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                            if(strpos($fullUrl,"usernameexist")==true){
                                           echo '<span style="color:red;"> Username has been used! </span>';
                                                     }
                                             ?> 
                                         </div>
                                    
                                        <div class="form-group mb-4">
                                            <label for="example-email" class="col-md-12 p-0">Email</label>
                                            <div class="col-md-12 border-bottom p-0">
                                            <input type="email" class="form-control p-0 border-0" name="email" placeholder="E-mail" required/>
                                                 <?php 
                                              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                if(strpos($fullUrl,"emailexist")==true){
                                                  echo '<span style="color:red;"> Email has been used! </span>';
                                                     }
                                                            ?>
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
                                            <label class="col-md-12 p-0">User Type</label>
                                            <?php
                    

                                            echo '<select class="form-select shadow-none p-0 border-0 form-control-line" name="userType" class="form-control" id="inputUserType">';

                                         {
                                           echo" <option value='1'>Admin</option>";
                                           echo" <option value='2'>Employee</option>";
                                           echo" <option value='3'>Customer</option>";
                                     
                                        
                                             }
                                              echo "</select>";

                                             ?>
                                        </div>


                                   
                                        <div class="form-group mb-4">
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-success name="signup_submit" id=submit value="Add user" required/><br>
                                            </div>
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
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password Not Match!';
    document.getElementById("submit").disabled = true;
  }
}

</script>

<?php include 'footer.php'?>
