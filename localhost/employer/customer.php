<?php 
include 'header.php';
include '../dbconnect.php';
include '../qmssession.php';

if(!session_id())
{
    session_start();
}
$u_username= $_SESSION['u_username']; 
$u_userID=$_SESSION['u_userID'];


$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"filter=yes")==true){
//Retreive customer
$sql="  SELECT * FROM tb_customer
        LEFT JOIN tb_address on tb_customer.c_addressID= tb_address.a_addressID
        LEFT JOIN tb_user ON tb_customer.c_userID = tb_user.u_userID
        LEFT JOIN tb_status ON tb_customer.c_statusID = tb_status.st_statusID
        WHERE c_userID = '$u_userID'
        ORDER BY st_statusID 
        ";}
            
        else{
            $sql="  SELECT * FROM tb_customer
        LEFT JOIN tb_address on tb_customer.c_addressID= tb_address.a_addressID
        LEFT JOIN tb_user ON tb_customer.c_userID = tb_user.u_userID
        LEFT JOIN tb_status ON tb_customer.c_statusID = tb_status.st_statusID
        ORDER BY st_statusID 
        ";}

$fullUrl1 = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl1,"alert=successadd")==true){
    echo '<script>alert("Add State Successfully")</script>';
  }

$fullUrl2 = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl2,"alert=successdelete")==true){
    echo '<script>alert("Delete State Successfully")</script>';
  }

$fullUrl3 = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl3,"alert=addcutomer")==true){
    echo '<script>alert("Add Customer Successfully")</script>';
  }


$sql11 = "SELECT DISTINCT a_state FROM tb_address";
  $result11 = mysqli_query($con,$sql11);
  $nstate = 13 - mysqli_num_rows($result11);
  $n1 = 0;

  $state1 = array("Johor","Kedah","Kelantan","Melaka","Negeri Sembilan","Pahang","Penang","Perak","Perlis","Selangor", "Terengganu", "Sabah", "Sarawak");

  while($row11 = mysqli_fetch_array($result11)){
    $state2[$n1++] = $row11[0];
  }  

 ?> 

   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> 
                            <a href="customer.php" style="color:black;">Customer</a>
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12" >
                        <div class="d-md-flex">

                            <p class="breadcrumb ms-auto" style="padding-right:20px;">
                              <a class="fw-normal">Filtered By : </a>
                            </p>
                            <?php 
                                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                if(strpos($fullUrl,"filter=yes")==true){
                                    echo '<select class="form-select" onchange="location = this.value;" style="width:250px;" >';
                                    echo '<option value="customer.php">All Customer</option>';
                                    echo '<option value="customer.php?filter=yes" selected>Customer Under Your Account</option>';
                                    echo '</select>';
                                }
                                else{
                                    echo '<select class="form-select" onchange="location = this.value;" style="width:250px;" >';
                                    echo '<option value="customer.php">All Customer</option>';
                                    echo '<option value="customer.php?filter=yes">Customer Under Your Account</option>';
                                    echo '</select>';
                                }
                            ?>
                        </div>
                    </div>         
                <!-- /.col-lg-12 -->
            </div>
          </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

<div class="container-fluid">
    <div class="text-end" style="margin-bottom:15px;">
      <button type='button'  class="btn btn-secondary btn-lg" data-bs-toggle='modal' data-bs-target='#managestate'> + Manage State</button>

      <button type='button'  class="btn btn-primary btn-lg" onclick="location.href='addcustomer.php'" style="margin-left: 20px;"> + Add Customer</button>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title"></h3>
                
                <div class="table-responsive">
                    <table class="table text-nowrap" id="custtable">
                        <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th scope="border-top-0">Customer Name</th>
                                <th scope="border-top-0">Phone No</th>
                                <th scope="border-top-0">Addresses</th>
                                <th scope="border-top-0">Status</th>
                                <th scope="border-top-0">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
        <?php       
                
                 $i = 1;
                
                 $result = mysqli_query($con, $sql);
                 while ($row=mysqli_fetch_array($result) )
                 {
                  
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".$row['c_customerName']."</td>";
                echo "<td>".$row['c_phoneNo']."</td>";
                echo "<td>".$row['a_street']. "<br>" .$row['a_postcode']. " ".$row['a_city']. "<br>" .$row['a_state']. "</td>";
                if($row['c_statusID']== 6){  
                                                        echo "<td><span class ='text-success'>".$row['st_details']."</span></td>";
                                                             }
                                                          if($row['c_statusID']== 7){  
                                                        echo "<td><span style='color:red;'>".$row['st_details']."</span></td>";
                                                             }
                          
            

                echo "<td>";
                echo"<a  class='qedit' href='customeredit.php?id=".$row['c_custID']."' type='button'> <i class='fas fa-edit' title='Modify' aria-hidden='true'> </i> </a> &nbsp";
                echo"
                <a class='qreject' onClick='customerdelete(".$row['c_custID'].")' type='button' title='Deactivate customer' data-bs-toggle='modal' data-bs-target='#dlt'><i class='fas fa-power-off' aria-hidden='true'></i></a>";
                echo "</tr>";
            
            
        }

        ?>
                                      
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="dlt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you really want to deactivate?</h3>
              </div> 

              <div class="modal-body text-center">
                    <a type="button" class="btn btn-success btn-lg" data-bs-dismiss="modal" style="margin-right: 10px;">
                        No
                    </a> 
                    <a id="deletebutton" href="#" class="btn btn-danger btn-lg" tabindex="0" > 
                        Deactivate
                    </a>

              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

<!-- state -->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="managestate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:50px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-header text-center"> 
                <h3 class="modal-title" id="exampleModalLabel">Manage State</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div> 

              <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="addstateprocess.php">
    <fieldset>
      <legend>ADD NEW SERVICE STATE</legend>

       <div class="form-group " >
        <label for="inputState" class="col-lg-2 control-label"><h4>State :</h4></label>
        <div class="col-lg-10">
          
        <select class="form-select form-group" name="inputState" id="fstate" style="width:200px;" required>
            <option value='' disabled selected hidden> ------ Select An Option ------</option>
          <?php 
            $i = 0;
            while($i < 13){
              $x = 0;
              while (($x < $nstate) && ($state1[$i] != $state2[$x])){
                $x++;
              }
              if($x == $nstate){
                echo '<option value="'.$state1[$i].'">'.$state1[$i].'</option>';
              }
              $i++;
            } 
          ?>
          
    </select>

 <button class="btn btn-primary" type="submit" name="submit" value="Insert"> Insert </button>
     
        </div>
      </div>

     
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
        
        </div>
      </div>
    </fieldset>
  </form><br><br><br>



  <form class="form-horizontal" method="POST" action="deletestateprocess.php">
    <fieldset>
      <legend>DELETE CURRENT SERVICE STATE</legend>

    
      
       <div class="form-group " >
        <label for="inputState1" class="col-lg-2 control-label"><h4>State :</h4></label>
        <div class="col-lg-10">
          
        <?php

          $sql = "SELECT DISTINCT a_state FROM tb_address";
          $result = mysqli_query($con,$sql);

          echo '<select class="form-select form-group" name="fstate1" id="inputState1" style="width:200px;" required>';
          echo"<option value='' disabled selected hidden> ------ Select An Option ------</option>";
          while($row= mysqli_fetch_array($result))
          {
            echo "<option value='".$row['a_state']."'>".$row['a_state']." </option>";
          }
          echo '</select>';
        ?>

  </select>
 <button class="btn btn-danger" type="submit" name="submit"> Delete </button>
  
        </div><br><br>
      </div>


     
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
        
        </div>
      </div>
    </fieldset>
  </form>
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>



</div>
<script>
    function customerdelete(qid){
        document.getElementById('deletebutton').href = "customerdelete.php?id="+qid;
    }

    $(document).ready(function(){
        $('#custtable').dataTable();
    });
</script>




<?php include 'footer.php'?>