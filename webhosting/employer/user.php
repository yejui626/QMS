<?php include 'header.php'; ?>

<script>
        // Get the modal
      var myModal = document.getElementById('myModal')
      var myInput = document.getElementById('myInput')

      myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
      })

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";

            
          }
        }
      </script>


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


<?php 
 


if(!session_id())
{
    session_start();
}



  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl,"alert=successregister")==true){
           echo '<div class="col-lg-6">';
           echo '<div class="modal fade show" id="useraddedModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
           echo '<div class="modal-dialog">
                   
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>User added successsfully!</h3>
                  </div> 

                  <div class="modal-body text-center">

                        <a class="btn btn-primary btn-lg" href="user.php">
                            Close
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>';
  }

  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl,"alert=successdelete")==true){
    echo '<div class="col-lg-6">';
           echo '<div class="modal fade show" id="useraddedModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
           echo '<div class="modal-dialog">
                   
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>User is successfully deleted.</h3>
                  </div> 

                  <div class="modal-body text-center">

                        <a class="btn btn-primary btn-lg" href="user.php">
                            Close
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>';
  }

  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl,"alert=successedit")==true){


    
     echo '<div class="col-lg-6">';
           echo '<div class="modal fade show" id="useraddedModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
           echo '<div class="modal-dialog">
                   
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>User information is successfully edited.</h3>
                  </div> 

                  <div class="modal-body text-center">

                        <a class="btn btn-primary btn-lg" href="user.php">
                            Close
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>';
  }

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

                        <a class="btn btn-primary btn-lg" href="user.php">
                            Close
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>';
  }


                                             


//Retrieve User information (JOIN)
$sql = "SELECT * FROM tb_user
   LEFT JOIN tb_status ON tb_user.u_statusID = tb_status.st_statusID
    WHERE  u_statusID ='6' || '7' 
    ORDER BY u_statusID, u_type";

$resultcount = 0;
$result = mysqli_query($con, $sql);

 $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                if(strpos($fullUrl,"usernameexist")==true){
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="modal fade show" id="usernameexistModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
                                    echo '<div class="modal-dialog">
                   
                                    <div class="modal-content">
                                    <div class="modal-body text-center"> <i class="fas fa-exclamation-circle fa-4x mb-3 animated rotateIn icon1"></i>
                                      <h3>Username already exist!</h3>
                                        </div> 

                                  <div class="modal-body text-center">

                   
                        <a class="btn btn-primary btn-lg" href="user.php">
                            Close
                         </a> 
                             </div>
                  

              </div>
          </div>
        </div>
          
    </div>'; }


    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                if(strpos($fullUrl,"emailexist")==true){
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="modal fade show" id="usernameexistModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
                                    echo '<div class="modal-dialog">
                   
                                    <div class="modal-content">
                                    <div class="modal-body text-center"> <i class="fas fa-exclamation-circle fa-4x mb-3 animated rotateIn icon1"></i>
                                      <h3>E-mail already exist!</h3>
                                        </div> 

                                  <div class="modal-body text-center">

                   
                        <a class="btn btn-primary btn-lg" href="user.php">
                            Close
                         </a> 
                             </div>
                  

              </div>
          </div>
        </div>
          
    </div>'; }

    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                if(strpos($fullUrl,"ueexist")==true){
                                    echo '<div class="col-lg-6">';
                                    echo '<div class="modal fade show" id="usernameexistModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
                                    echo '<div class="modal-dialog">
                   
                                    <div class="modal-content">
                                    <div class="modal-body text-center"> <i class="fas fa-exclamation-circle fa-4x mb-3 animated rotateIn icon1"></i>
                                      <h3>Username and E-mail already exist!</h3>
                                        </div> 

                                  <div class="modal-body text-center">

                   
                        <a class="btn btn-primary btn-lg" href="user.php">
                            Close
                         </a> 
                             </div>
                  

              </div>
          </div>
        </div>
          
    </div>'; }
    
?> 



<style>
  .rightbtn{

          
        border: none; 
        text-align: right ;
       
    }
    
</style>


   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">User Page</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->


<div class="container-fluid">
    <div class="rightbtn" >
    <button type='button' class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#adduserModal"> + Add User</button>
  </div><br>


                        

 

<div class="modal fade" id="adduserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Add User Form</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="booking" class="section">
                <div class="section-center">
                  <div class="container">
                    <div class="row">
                      <div class="booking-form">
                        <form class="form-horizontal" method="POST" action="adduserprocess.php">
<div class="container-fluid">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Username</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text"  class="form-control p-0 border-0" name="username" placeholder="Username" required />


                                              </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" class="form-control p-0 border-0" name="email" placeholder="E-mail" required/>
                                                 <?php 
                                              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                if(strpos($fullUrl,"emailexist")==true){
                                                  echo "<script type='text/javascript'>
                                               $('adduserModal').modal('show');
                                                      });
                                                    </script>";
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
                                        echo " <option value='' disabled selected hidden>Please select user type</option>";

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






                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title"></h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap" id="usertable">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">User ID</th>
                                            <th class="border-top-0">User Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">User type</th>
                                            <th class="border-top-0">User Status</th>
                                            <th class="border-top-0">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                             while($row=mysqli_fetch_array($result))
                                                 {
                                                      $resultcount = $resultcount +1;
                                                        echo "<tr>";
                                                        echo "<td>".$resultcount."</td>";
                                                        echo "<td>".$row['u_userID']."</td>";
                                                        echo "<td>".$row['u_username']."</td>";
                                                         echo "<td>".$row['u_email']."</td>";
                                                         if($row['u_type'] == 1){
                                                           echo "<td>"."admin"."</td>";
                                                         }

                                                          else if($row['u_type'] == 2){
                                                         echo "<td>"."employee"."</td>";
                                                          }

                                                          else if($row['u_type'] == 3){
                                                            echo "<td>"."customer"."</td>";
                                                             }

                                                         if($row['u_statusID']== 6){  
                                                        echo "<td><span class ='text-success'>".$row['st_details']."</span></td>";
                                                             }
                                                          if($row['u_statusID']== 7){  
                                                        echo "<td><span style='color:red;'>".$row['st_details']."</span></td>";
                                                             }


                                                        echo "<td>";
                            echo "<a href = 'useredit.php?id=".$row['u_userID']."' class='btn btn-warning'> Edit </a> &nbsp";
                             echo "
                                    <a class='btn btn-danger' onClick='deleteuser(".$row['u_userID'].");' type='button' title='Delete Quotation' data-bs-toggle='modal' data-bs-target='#dlt'><i class='fas fa-trash-alt' aria-hidden='true'></i>Delete</a> ";

            
                                                         echo "</td>";
                          

                                                            }
                                      
                                                             ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


<script>
 

    function deleteuser(uid){
        document.getElementById('deletebutton').href = "userdeleteprocess.php?id="+uid;
    }
    $(document).ready(function(){
      $('#usertable').dataTable();
    });

</script>
            <!-- Modal Delete?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="dlt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you really want to delete the user?</h3>
              </div> 

              <div class="modal-body text-center">
                    
                    <a type="button" class="btn btn-success btn-lg" data-bs-dismiss="modal">
                        No
                    </a> 
                    <a id="deletebutton" href="#" class="btn btn-danger btn-lg" tabindex="0" style="margin-right: 10px;"> 
                        Delete
                    </a>
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>


</div>


<?php include 'footer.php'?>