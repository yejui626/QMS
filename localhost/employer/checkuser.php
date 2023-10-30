<?php include 'header.php'; 


$uid = $_SESSION['u_userID'];
$sql="  SELECT * FROM tb_user WHERE u_userID= '$uid'";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

 
   ?>      
                     <!-- Column -->
                    <!-- Column -->


   
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile information</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

    
    
    <div class="container-fluid">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
              <div class="forgot">
                  <h2>Please enter your password before proceed to the profile page.</h2>
                 
                  <form  method="POST" action="checkuserprocess.php">
                  <div class="card-body">
                      <div class="form-group"> <label for="email-for-pass">Enter your password: </label> <input class="form-control" type="password" name="password" required=""><small class="form-text text-muted"></small> 
                         <?php 
                              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                              if(strpos($fullUrl,"notexist")==true){
                                  echo '<span style="color:red;"> password incorrect! </span>';
                              }
                          ?>
          
                   </div>
                  </div>

                  <button class="btn btn-success" type="submit">Proceed</button> 
                </form>
            
            </div>
          </div>
        </div>
    </div>
  
  

 <?php include 'footer.php'?>