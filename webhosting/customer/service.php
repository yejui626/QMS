<?php
include '../qmssession.php';

if(!session_id())
{
    session_start();
}
include '../dbconnect.php';
include 'header.php'; 

$u_userID=$_SESSION['u_userID'];

//Retreive booking (JOIN)

$sql="  SELECT * FROM tb_service 
    LEFT JOIN tb_user ON tb_service.s_userID = tb_user.u_userID
    LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
    LEFT JOIN tb_status ON tb_service.s_statusID = tb_status.st_statusID
    LEFT JOIN tb_type ON tb_service.s_typeID = tb_type.t_typeID
    WHERE s_statusID = '1' AND c_userID = $u_userID
    ORDER BY s_requestDate";

$result=mysqli_query($con,$sql);

$tdate = date("Y-m-d");

?> 
<style>
@media (max-width: 767px) {
    .table-responsive .dropdown-menu {
        right: 0px;
    }
}
@media (min-width:321px) and (max-width:768px) {
    .table-responsive .dropdown-menu {
        right: 0px;
    }
}
@media (min-width: 769px) {
    .table-responsive {
        overflow: visible;
    }
}

</style> 

<div class="page-breadcrumb bg-white">
  <div class="row align-items-center">
    <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h4 class="page-title"> 
          <a href="service.php" style="color:black;">Service</a>
      </h4>
    </div>
  </div>
</div>

<div class="container-fluid">

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Service Booking Form</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="booking" class="section">
                <div class="section-center">
                  <div class="container">
                    <div class="row">
                      <div class="booking-form">
                        <form class="form-horizontal form-material" method="POST" action="servicebookingprocess.php">
                          <div class="form-group">
                            <label for="inputCustomer" class="control-label">Choose Customer</label>
                            <?php 
                              $sql1="  SELECT * FROM tb_customer WHERE c_statusID ='6' AND c_userID =$u_userID";
                              $result1 = mysqli_query($con,$sql1);
                              echo"<select name='fcustomer' class='form-control' id='inputVehicleModel' required>";
                              while($row1=mysqli_fetch_array($result1))
                              {
                              echo"<option value='".$row1['c_custID']."'>".$row1['c_customerName']."</option>";
                              }
                              echo"</select>"
                            ?>
                          </div>

                          <div class="form-group">
                            <label for="inputBookingDate" class="control-label">Select Booking Date</label>
                            <input type="date" name="fbdate" class="form-control" id="inputBookingDate" min="<?php echo $tdate; ?>" required>
                          </div>

                          <div class="form-group">
                            <label for="inputType" class="control-label">Choose Service Type</label>
                            <?php 
                              $sql2="  SELECT * FROM tb_type;";
                    
                              $result2 = mysqli_query($con,$sql2);
                              echo"<select name='ftype' class='form-control' id='inputCustomer' required>;
                                  <option value='' disabled selected hidden>PLEASE SELECT YOUR SERVICE</option>";
                              while($row2=mysqli_fetch_array($result2))
                              {
                              echo"
                              <option value='".$row2['t_typeID']."'>".$row2['t_details']."</option>";
                              }
                              echo"</select>"
                            ?>
                          </div>

                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Please Enter Service Details</label>
                            <textarea name ="fdetails" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="eg : Air Cond General Cleaning · Air Cond Chemical Cleaning · Air Cond Overhaul Cleaning ·" required></textarea>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary name="signup_submit" id=submit value="Book" required/>
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

  <div class="row" >
    <div class="col-sm-12">
      <div class="row" style="padding-bottom: 10px;">
        <div class="col-8">
          <h2 style="margin-bottom:0px;"><strong>Pending Services</strong></h2>
        </div>
        <div class="col-4">
         <?php
              $sql1="  SELECT * FROM tb_customer 
              LEFT JOIN tb_user ON tb_customer.c_userID = tb_user.u_userID
              WHERE c_statusID = '6' AND c_userID = $u_userID";

              $resultc=mysqli_query($con,$sql1);
              $count = mysqli_num_rows($resultc);

              if($count > 0)
              { ?>
               <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display:inline; float: right" >+ Request Service</button>

              <?php 
              }
              else{ ?>
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addcustomer" style="display:inline; float: right" >+ Request Service</button>

              <?php } ?>
        
        </div>
      </div>
        <div class="white-box">
          <div class="table-responsive " >
            <table class="table text-hover" id="pendingtable">
      <thead>
        <tr>
          <th class="border-bottom">Service ID</th>
          <th class="border-bottom">Customer</th>
          <th class="border-bottom">Service Type</th>
          <th class="border-bottom">Requested Date</th>
          <th class="border-bottom">Completed Date</th>
          <th class="border-bottom">Details</th>
          <th class="border-bottom">Status</th>
          <th class="border-bottom">Action</th>
        </tr>
      </thead>
      <tbody> 
        <?php 
          while ($row=mysqli_fetch_array($result))
          {
            echo "<tr>";
            echo "<td>".$row['s_serviceID']."</td>";
            echo "<td>".$row['c_customerName']."</td>";
            echo "<td>".$row['t_details']."</td>";
            echo "<td>".date("d/m/y", strtotime($row['s_requestDate']))."</td>";

            if ($row['s_completeDate'] == '0000-00-00 00:00:00'){
                echo "<td style='padding-left:60px;'>-</td>";
              }else{
                echo "<td>".date("d/m/y", strtotime($row['s_completeDate']))."</td>";
              }
            echo "<td>".$row['s_details']."</td>";
            if($row['s_statusID']=='1'){
              echo "<td><span class='fw-normal text-warning'>".$row['st_details']."</span></td>";
            }else if ($row['s_statusID']=='2'){
              echo "<td><span class='fw-normal text-danger'>".$row['st_details']."</span></td>";
            }else if ($row['s_statusID']=='3'){
              echo "<td><span class='fw-normal text-success'>".$row['st_details']."</span></td>";
            }else if ($row['s_statusID']=='4'){
              echo "<td><span class='fw-normal text-primary'>".$row['st_details']."</span></td>";
            }else if ($row['s_statusID']=='5'){
              echo "<td><span class='fw-normal text-secondary'>".$row['st_details']."</span></td>";
            }

            echo "<td>
              <div role='group' class='btn-group dropdown'>
                  <a class='text-dark m-0' role='button' href='#''  id='dropdownMenuLink' data-bs-toggle='dropdown' data-boundary='window' aria-expanded='false' >
                    <span class='icon icon-sm'>
                      <svg aria-hidden='true' height='20' width='30' focusable='false' data-prefix='fas' data-icon='ellipsis-h' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                        <path fill='currentColor' d='M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z'></path>
                      </svg>
                    </span>
                  </a>
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='servicedetails.php?id=".$row['s_serviceID']."''>View Service Details</a>
                    <a class='dropdown-item' href='#' onClick='cancelservice(".$row['s_serviceID'].");'data-bs-toggle='modal' data-bs-target='#cancel'>Cancel Service</a>                  
                    </div>
                </div>
              </div>
            </td>";
            echo "</tr>";
            
          }
        ?>
            </tbody>
          </table>
  </div>
 </div>
  </div>
  </div>




<div class="row" >
    <div class="col-sm-12">
        <h2><strong>Accepted/ Rejected Services</strong></h2>
        <div class="white-box">
          <div class="table-responsive " >
            <table class="table text-hover" id="accepttable">
      <thead>
        <tr>
          <th class="border-bottom">Service ID</th>
          <th class="border-bottom">Customer</th>
          <th class="border-bottom">Service Type</th>
          <th class="border-bottom">Requested Date</th>
          <th class="border-bottom">Completed Date</th>
          <th class="border-bottom">Details</th>
          <th class="border-bottom">Status</th>
          <th class="border-bottom">Action</th>
        </tr>
      </thead>
      <tbody> 
        <?php

          $sqlstatus23="  SELECT * FROM tb_service 
          LEFT JOIN tb_user ON tb_service.s_userID = tb_user.u_userID
          LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
          LEFT JOIN tb_status ON tb_service.s_statusID = tb_status.st_statusID
          LEFT JOIN tb_type ON tb_service.s_typeID = tb_type.t_typeID
          WHERE (s_statusID = '2' OR s_statusID = '3') AND c_userID =$u_userID";

          $resultstatus23=mysqli_query($con,$sqlstatus23); 
          while ($rowstatus23=mysqli_fetch_array($resultstatus23))
          {
            echo "<tr>";
            echo "<td>".$rowstatus23['s_serviceID']."</td>";
            echo "<td>".$rowstatus23['c_customerName']."</td>";
            echo "<td>".$rowstatus23['t_details']."</td>";
            echo "<td>".date("d/m/y", strtotime($rowstatus23['s_requestDate']))."</td>";

            if ($rowstatus23['s_completeDate'] == '0000-00-00 00:00:00'){
                echo "<td style='padding-left:60px;'>-</td>";
              }else{
                echo "<td>".date("d/m/y", strtotime($rowstatus23['s_completeDate']))."</td>";
              }
            echo "<td>".$rowstatus23['s_details']."</td>";
            if($rowstatus23['s_statusID']=='1'){
              echo "<td><span class='fw-normal text-warning'>".$rowstatus23['st_details']."</span></td>";
            }else if ($rowstatus23['s_statusID']=='2'){
              echo "<td><span class='fw-normal text-danger'>".$rowstatus23['st_details']."</span></td>";
            }else if ($rowstatus23['s_statusID']=='3'){
              echo "<td><span class='fw-normal text-success'>".$rowstatus23['st_details']."</span></td>";
            }else if ($rowstatus23['s_statusID']=='4'){
              echo "<td><span class='fw-normal text-primary'>".$rowstatus23['st_details']."</span></td>";
            }else if ($rowstatus23['s_statusID']=='5'){
              echo "<td><span class='fw-normal text-secondary'>".$rowstatus23['st_details']."</span></td>";
            }

            echo "<td>
              <div role='group' class='btn-group dropdown'>
                  <a class='text-dark m-0' role='button' href='#''  id='dropdownMenuLink' data-bs-toggle='dropdown' data-boundary='window' aria-expanded='false' >
                    <span class='icon icon-sm'>
                      <svg aria-hidden='true' height='20' width='30' focusable='false' data-prefix='fas' data-icon='ellipsis-h' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                        <path fill='currentColor' d='M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z'></path>
                      </svg>
                    </span>
                  </a>
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='servicedetails.php?id=".$rowstatus23['s_serviceID']."''>View Service Details</a>
                    <a class='dropdown-item' href='#' onClick='cancelservice(".$row['s_serviceID'].");'data-bs-toggle='modal' data-bs-target='#cancel'>Cancel Service</a>
                  </div>
                </div>
              </div>
            </td>";
            echo "</tr>";
            
          }
        ?>
            </tbody>
          </table>
  </div>
 </div>
  </div>
  </div>



    <div class="row" >
    <div class="col-sm-12">
        <h2><strong>Completed Services</strong></h2>
        <div class="white-box">
          <div class="table-responsive " >
            <table class="table text-hover" id="completetable">
      <thead>
        <tr>
          <th class="border-bottom">Service ID</th>
          <th class="border-bottom">Customer</th>
          <th class="border-bottom">Service Type</th>
          <th class="border-bottom">Requested Date</th>
          <th class="border-bottom">Completed Date</th>
          <th class="border-bottom">Details</th>
          <th class="border-bottom">Status</th>
          <th class="border-bottom">Action</th>
        </tr>
      </thead>
      <tbody> 
        <?php

          $sqlstatus4="  SELECT * FROM tb_service 
          LEFT JOIN tb_user ON tb_service.s_userID = tb_user.u_userID
          LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
          LEFT JOIN tb_status ON tb_service.s_statusID = tb_status.st_statusID
          LEFT JOIN tb_type ON tb_service.s_typeID = tb_type.t_typeID
          WHERE s_statusID = '4' AND c_userID =$u_userID";

          $resultstatus4=mysqli_query($con,$sqlstatus4); 
          while ($rowstatus4=mysqli_fetch_array($resultstatus4))
          {
            echo "<tr>";
            echo "<td>".$rowstatus4['s_serviceID']."</td>";
            echo "<td>".$rowstatus4['c_customerName']."</td>";
            echo "<td>".$rowstatus4['t_details']."</td>";
            echo "<td>".date("d/m/y", strtotime($rowstatus4['s_requestDate']))."</td>";

            if ($rowstatus4['s_completeDate'] == '0000-00-00 00:00:00'){
                echo "<td style='padding-left:60px;'>-</td>";
              }else{
                echo "<td>".date("d/m/y", strtotime($rowstatus4['s_completeDate']))."</td>";
              }
            echo "<td>".$rowstatus4['s_details']."</td>";
            if($rowstatus4['s_statusID']=='1'){
              echo "<td><span class='fw-normal text-warning'>".$rowstatus4['st_details']."</span></td>";
            }else if ($rowstatus4['s_statusID']=='2'){
              echo "<td><span class='fw-normal text-danger'>".$rowstatus4['st_details']."</span></td>";
            }else if ($rowstatus4['s_statusID']=='3'){
              echo "<td><span class='fw-normal text-success'>".$rowstatus4['st_details']."</span></td>";
            }else if ($rowstatus4['s_statusID']=='4'){
              echo "<td><span class='fw-normal text-primary'>".$rowstatus4['st_details']."</span></td>";
            }else if ($rowstatus4['s_statusID']=='5'){
              echo "<td><span class='fw-normal text-secondary'>".$rowstatus4['st_details']."</span></td>";
            }

            echo "<td>
              <div role='group' class='btn-group dropdown'>
                  <a class='text-dark m-0' role='button' href='#''  id='dropdownMenuLink' data-bs-toggle='dropdown' data-boundary='window' aria-expanded='false' >
                    <span class='icon icon-sm'>
                      <svg aria-hidden='true' height='20' width='30' focusable='false' data-prefix='fas' data-icon='ellipsis-h' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                        <path fill='currentColor' d='M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z'></path>
                      </svg>
                    </span>
                  </a>
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='servicedetails.php?id=".$rowstatus4['s_serviceID']."''>View Service Details</a>
                    <a class='dropdown-item' href='#' onClick='cancelservice(".$row['s_serviceID'].");'data-bs-toggle='modal' data-bs-target='#cancel'>Cancel Service</a>
                  </div>
                </div>
              </div>
            </td>";
            echo "</tr>";
            
          }
        ?>
            </tbody>
          </table>
  </div>
 </div>
  </div>
  </div>

<!-- Modal Cancel?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you really want to cancel the service?</h3>
              </div> 

              <div class="modal-body text-center">
                    <a type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px;">
                        No
                    </a> 
                    <a id="cancelbutton" href="#" class="btn btn-primary btn-lg" tabindex="0" > 
                        Yes
                    </a>

              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

<!-- Modal add cust?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="addcustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class=" fas fa-exclamation-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Please add a customer at the customer page first!</h3>
              </div> 

              <div class="modal-body text-center">
                    <a type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px;">
                        Maybe Later
                    </a> 
                    <a id="" href="addcustomer.php" class="btn btn-primary btn-lg" tabindex="0" > 
                        Add Customer
                    </a>

              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>
</div>





<script>

    function cancelservice(sid){
        document.getElementById('cancelbutton').href = "servicecancel.php?id="+sid;
    }

    $(document).ready(function(){
        $('#pendingtable').dataTable();
    });

    $(document).ready(function(){
        $('#accepttable').dataTable();
    });

    $(document).ready(function(){
        $('#completetable').dataTable();
    });

    
</script>
<?php include 'footer.php'?>