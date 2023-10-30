<?php include 'header.php'; 

$u_userID=$_SESSION['u_userID'];

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"filter=yes")==true){
        $sql = "SELECT * FROM tb_quotation 
                LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
                LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
                LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
                WHERE q_statusID = '1' AND c_userID = '$u_userID' ORDER BY q_date " ;

        //Retrieve accepted quotation
        $sql1 = "SELECT * FROM tb_quotation 
                 LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
                 LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID 
                 LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
                 WHERE q_statusID = '3' AND c_userID = '$u_userID' ORDER BY q_date DESC ";

        //Retrieve rejected quotation
        $sql2 = "SELECT * FROM tb_quotation 
                 LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID 
                 LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
                 LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
                 WHERE q_statusID = '2' AND c_userID = '$u_userID' ORDER BY q_date DESC ";

        $sql3 = "SELECT * FROM tb_quotation 
                 LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID 
                 LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
                 LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
                 WHERE q_statusID = '5' AND c_userID = '$u_userID' ORDER BY q_date DESC ";
    }
    else{
        //Retrieve pending quotation
        $sql = "SELECT * FROM tb_quotation 
                LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
                LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
                LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
                WHERE q_statusID = '1' ORDER BY q_date ";

        //Retrieve accepted quotation
        $sql1 = "SELECT * FROM tb_quotation 
                 LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
                 LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID 
                 LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
                 WHERE q_statusID = '3' ORDER BY q_date DESC ";

        //Retrieve rejected quotation
        $sql2 = "SELECT * FROM tb_quotation 
                 LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID 
                 LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
                 LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
                 WHERE q_statusID = '2' ORDER BY q_date DESC ";

        $sql3 = "SELECT * FROM tb_quotation 
                 LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID 
                 LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
                 LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
                 WHERE q_statusID = '5' ORDER BY q_date DESC ";
    }
    $result = mysqli_query($con, $sql);
    $result1 = mysqli_query($con, $sql1);
    $result2 = mysqli_query($con, $sql2);
    $result3 = mysqli_query($con, $sql3);
?> 

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> 
                            <a href="quotation.php" style="color:black;">Quotation</a>
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
                                    echo '<option value="quotation.php">All Customer</option>';
                                    echo '<option value="quotation.php?filter=yes" selected>Customer Under Your Account</option>';
                                    echo '</select>';
                                }
                                else{
                                    echo '<select class="form-select" onchange="location = this.value;" style="width:250px;" >';
                                    echo '<option value="quotation.php">All Customer</option>';
                                    echo '<option value="quotation.php?filter=yes">Customer Under Your Account</option>';
                                    echo '</select>';
                                }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">

                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0" style="font-size:30px;"><strong>
                                    Pending Quotation
                                </strong></h3>
                                
                            </div>

                        <div class="white-box">
                            <div class="table-responsive text-center">
                                <table class="table table-hover" id = "pendingtable" style="border:0px #ddd;">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No.</th>
                                            <th class="border-top-0">Quotation ID</th>
                                            <th class="border-top-0">Service ID</th>
                                            <th class="border-top-0" style="text-align:left;">Customer Name</th>
                                            <th class="border-top-0">Date </th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                            <th class="border-top-0"> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            $start = 11;
                                            $end = 20;

                                            if(mysqli_num_rows($result)>0){
                                            while ($row = mysqli_fetch_array($result)){
                                                /*if($i < $start || $i > $end ){
                                                    $i++;
                                                    continue;
                                                }*/

                                                echo "<tr>";
                                                echo "<td> ".$i++."</td>";
                                                echo "<td> ".$row['q_quotationID'].   
                                                    "&nbsp <a class='qview' href='quotationview.php?id=".$row['q_quotationID']."' title='View Quotation' > 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";

                                                echo "<td> ".$row['q_serviceID'].
                                                    "&nbsp <a class='qview' href='servicedetails.php?id=".$row['q_serviceID']."' title='View Service'> 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";
                                                echo "<td style='text-align:left;'> ".$row['c_customerName']."</td>";
                                                echo "<td> ".$row['q_date']."</td>";
                                                if($row['q_statusID']=='1'){
                                                  echo "<td><span class='fw-normal text-warning'>".$row['st_details']."</span></td>";
                                                }else if ($row['q_statusID']=='2'){
                                                  echo "<td><span class='fw-normal text-danger'>".$row['st_details']."</span></td>";
                                                }else if ($row['q_statusID']=='3'){
                                                  echo "<td><span class='fw-normal text-success'>".$row['st_details']."</span></td>";
                                                }
                                                echo "<td>
                                                <a class='qaccept' onClick='acceptquotation(".$row['q_quotationID'].");' type='button' title='Accept Quotation' data-bs-toggle='modal' data-bs-target='#qaccept'> 
                                                    <i class='fas fa-check-square fa-lg' aria-hidden='true'></i>
                                                </a> &nbsp
                                                <a class='qreject' onClick='rejectquotation(".$row['q_quotationID'].");' type='button' title='Reject Quotation' data-bs-toggle='modal' data-bs-target='#qreject'> 
                                                    <i class='fas fa-window-close fa-lg' aria-hidden='true'></i>
                                                </a>";
                                                echo "</td>";
                                                
                    echo "<td>
                        
                      <div role='group' class='dropdown show'>
                          <a class='text-dark m-0' role='button' href='#''  id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false' >
                            <span class='icon icon-sm'>
                              <svg aria-hidden='true' height='20' width='20' focusable='false' data-prefix='fas' data-icon='ellipsis-v' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                <path fill='currentColor' d='M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z'></path>
                              </svg>
                            </span>
                          </a>
                          <div class='dropdown-menu' aria-labelledby='dropdownMenuLink' >
                            <a class='dropdown-item' onClick='modifyquotation(".$row['q_quotationID'].");' type='button' title='Modify Quotation' data-bs-toggle='modal' data-bs-target='#modify'><i class='fas fa-edit' aria-hidden='true' style='color:blue; padding-right:10px;'></i>Modify Quotation</a>

                            <a class='dropdown-item' onClick='deletequotation(".$row['q_quotationID'].");' type='button' title='Delete Quotation' data-bs-toggle='modal' data-bs-target='#dlt'><i class='fas fa-trash-alt' aria-hidden='true' style='color:red; padding-right:15px;'></i>Delete Quotation</a>
                          </div>
                        </div>
                      </div>
                    </td>";
                                                echo "</tr>";
                                            }
                                        }
                                        /*else{
                                            echo "<tr><td>";
                                            echo "No Quotation Found. ";
                                            echo "</td></tr>";
                                        }*/
                                        ?>
                                                               
                                    </tbody>
                                </table>
                            </div>

                            
                <!-- ============================================================== -->
                <!-- End Table -->
                <!-- ============================================================== -->

                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- Accepted Quotation Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">

                            <div class="d-md-flex mb-3">
                                <h2 class="box-title mb-0" style="font-size:30px;"><strong>
                                    Accepted Quotation
                                </strong></h2>
                            </div>

                        <div class="white-box">
                            <div class="table-responsive text-center">
                                <table class="table table-hover" id = "accepttable" style="border:0px #ddd;">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No.</th>
                                            <th class="border-top-0">Quotation ID</th>
                                            <th class="border-top-0">Service ID</th>
                                            <th class="border-top-0" style="text-align:left;">Customer Name</th>
                                            <th class="border-top-0">Date </th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;

                                            if(mysqli_num_rows($result1)>0){
                                            while ($row1 = mysqli_fetch_array($result1)){

                                                echo "<tr>";
                                                echo "<td> ".$i++."</td>";
                                                echo "<td> ".$row1['q_quotationID'].   
                                                    "&nbsp <a class='qview' href='quotationview.php?id=".$row1['q_quotationID']."' title='View Quotation' > 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";

                                                echo "<td> ".$row1['q_serviceID'].
                                                    "&nbsp <a class='qview' href='servicedetails.php?id=".$row1['q_serviceID']."' title='View Service'> 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";
                                                echo "<td style='width:fit-content; text-align:left;'> ".$row1['c_customerName']."</td>";
                                                echo "<td> ".$row1['q_date']."</td>";
                                                echo "<td><span class='fw-normal text-success'>".$row1['st_details']."</span></td>";
                                                
                                                echo "<td>
                                                    <a class='qreject' onClick='deletequotation(".$row1['q_quotationID'].");' type='button' title='Delete Quotation' data-bs-toggle='modal' data-bs-target='#dlt'><i class='fas fa-trash-alt fa-lg' aria-hidden='true'></i></a>
                                                </td>";
                                                echo "</tr>";
                                                
                                            }
                                        }
                                        /*else{
                                            echo "<tr><td>";
                                            echo "No Quotation Found. ";
                                            echo "</td></tr>";
                                        }*/
                                        ?>
                                                                      
                                    </tbody>
                                </table>
                            </div>

                            
                <!-- ============================================================== -->
                <!-- End Table -->
                <!-- ============================================================== -->

                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- Rejected Quotation Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">

                            <div class="d-md-flex mb-3">
                                <h2 class="box-title mb-0" style="font-size:30px;"><strong>
                                    Rejected Quotation
                                </strong></h2>
                            </div>

                        <div class="white-box">
                            <div class="table-responsive text-center">
                                <table class="table table-hover" id = "rejecttable" style="border:0px #ddd;">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No.</th>
                                            <th class="border-top-0">Quotation ID</th>
                                            <th class="border-top-0">Service ID</th>
                                            <th class="border-top-0" style="text-align:left;">Customer Name</th>
                                            <th class="border-top-0">Date </th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0" style="text-align:left;">Rejected Reason</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;

                                            if(mysqli_num_rows($result2)>0){
                                            while ($row2 = mysqli_fetch_array($result2)){

                                                echo "<tr>";
                                                echo "<td> ".$i++."</td>";
                                                echo "<td> ".$row2['q_quotationID'].   
                                                    "&nbsp <a class='qview' href='quotationview.php?id=".$row2['q_quotationID']."' title='View Quotation' > 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";

                                                echo "<td> ".$row2['q_serviceID'].
                                                    "&nbsp <a class='qview' href='servicedetails.php?id=".$row2['q_serviceID']."' title='View Service'> 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";
                                                echo "<td style='text-align:left;'> ".$row2['c_customerName']."</td>";
                                                echo "<td> ".$row2['q_date']."</td>";
                                                echo "<td><span class='fw-normal text-danger'>".$row2['st_details']."</span></td>";
                                                echo "<td style='text-align:left;'><span class='fw-normal' style='white-space: pre-line'>".$row2['q_reason']."</span></td>";
                                                
                                                echo "<td>
                                                    <a class='qreject' onClick='deletequotation(".$row2['q_quotationID'].");' type='button' title='Delete Quotation' data-bs-toggle='modal' data-bs-target='#dlt'><i class='fas fa-trash-alt fa-lg' aria-hidden='true'></i></a>
                                                </td>";
                                                echo "</tr>";
                                            }
                                        }
                                      /*  else{
                                            echo "<tr><td>";
                                            echo "No Quotation Found. ";
                                            echo "</td></tr>";
                                        }*/
                                        ?>
                                                                      
                                    </tbody>
                                </table>
                            </div>

                            
                <!-- ============================================================== -->
                <!-- End Table -->
                <!-- ============================================================== -->

                        </div>
                    </div>
                </div>

                <!-- Deleted Quotation -->
                <!-- ============================================================== -->
            

                <div class="row">
                    <div class="col-md-12">

                            <div class="d-md-flex mb-3">
                                <h2 class="box-title mb-0" style="font-size:30px;"><strong>
                                    Deleted Quotation
                                </strong></h2>
                                <div class="ms-auto">
                                    <button class='btn btn-danger btn-lg' onClick='dbdeleteallquotation();' type='button' title='Delete Quotation' data-bs-toggle='modal' data-bs-target='#dltdb'> Delete All </button>
                                </div>
                            </div>

                        <div class="white-box">
                            <div class="table-responsive text-center">
                                <table class="table table-hover" id = "dlttable" style="border:0px #ddd;">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No.</th>
                                            <th class="border-top-0">Quotation ID</th>
                                            <th class="border-top-0">Service ID</th>
                                            <th class="border-top-0" style="text-align:left;">Customer Name</th>
                                            <th class="border-top-0">Date </th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;

                                            if(mysqli_num_rows($result3)>0){
                                            while ($row3 = mysqli_fetch_array($result3)){

                                                echo "<tr>";
                                                echo "<td> ".$i++."</td>";
                                                echo "<td> ".$row3['q_quotationID'].   
                                                    "&nbsp <a class='qview' href='quotationview.php?id=".$row3['q_quotationID']."' title='View Quotation' > 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";

                                                echo "<td> ".$row3['q_serviceID'].
                                                    "&nbsp <a class='qview' href='servicedetails.php?id=".$row3['q_serviceID']."' title='View Service'> 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";
                                                echo "<td style='text-align:left;'> ".$row3['c_customerName']."</td>";
                                                echo "<td> ".$row3['q_date']."</td>";
                                                echo "<td><span class='fw-normal text-secondary'>Deleted</span></td>";
                                                
                                                echo "<td>
                                                    <a class='qreject' onClick='dbdeletequotation(".$row3['q_quotationID'].");' type='button' title='Delete Quotation' data-bs-toggle='modal' data-bs-target='#dltdb'><i class='fas fa-trash-alt fa-lg' aria-hidden='true'></i></a>
                                                </td>";
                                                echo "</tr>";
                                                
                                            }
                                        }
                                        /*else{
                                            echo "<tr><td>";
                                            echo "No Quotation Found. ";
                                            echo "</td></tr>";
                                        }*/
                                        ?>
                                                                      
                                    </tbody>
                                </table>
                            </div>

                            
                <!-- ============================================================== -->
                <!-- End Table -->
                <!-- ============================================================== -->

                        </div>
                    </div>
                </div>
</div> <!-- end of container -->

<!-- Modal Accept?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="qaccept" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Accept the quotation?</h3>
              </div> 

              <div class="modal-body text-center">
                    <a type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px; width:85px;">
                        No
                    </a> 
                    <a id="acceptbutton" href="#" class="btn btn-success btn-lg" tabindex="0" > 
                        Accept
                    </a>
                    
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

<!-- Modal Reject?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="qreject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <form class="form-horizontal form-material" method="POST" action="quotationreject.php">
          <div class="modal-content">
              <div class="modal-body text-center"><i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Reject the quotation?</h3>
              </div> 

              <div class="modal-body text-center">
                    <div class="text-center">
                        <h4>Tell Us Your Reason</h4>
                    </div> 
                    <textarea name ="reason" class="form-control" id="ReasonText" rows="3" placeholder="Your Reason" required></textarea> 

                    <input id="rejectbutton" type="hidden" name="qid" class="form-control" value=""> 
              </div>
              <!-- Modal Footer-->
              <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal" onClick="reset();">
                        Close
                    </button>
                    <input type="submit" class="btn btn-warning btn-lg" value="Reject" required/>
              </div> 

          </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal Modify?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you really want to modify?</h3>
              </div> 

              <div class="modal-body text-center">
                <a type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px; width:85px;">
                        No
                    </a> 
                    <a id="modifybutton" href="#" class="btn btn-primary btn-lg" tabindex="0" > 
                        Modify
                    </a>
                    
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

<!-- Modal Delete?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="dlt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you really want to delete?</h3>
              </div> 

              <div class="modal-body text-center">
                <a type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px; width:85px;">
                        No
                    </a> 
                    <a id="deletebutton" href="#" class="btn btn-danger btn-lg" tabindex="0" s> 
                        Delete
                    </a>
                    
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

<!-- Modal Db Delete?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="dltdb" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Delete quotation permanently?</h3>
                  <b> This action cannot be reverted!</b>
              </div> 

              <div class="modal-body text-center">
                    <a type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px; width:85px;">
                        No
                    </a> 
                    <a id="dbdeletebutton" href="#" class="btn btn-danger btn-lg" tabindex="0" > 
                        Delete
                    </a>
                    
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

<script>
    function acceptquotation(qid){
        document.getElementById('acceptbutton').href = "quotationaccept.php?id="+qid;
    }

    function rejectquotation(qid){
        document.getElementById('rejectbutton').value = qid;
    }

    function modifyquotation(qid){
        document.getElementById('modifybutton').href = "quotationmodify.php?id="+qid;
    }

    function deletequotation(qid){
        document.getElementById('deletebutton').href = "quotationcancel.php?id="+qid;
    }

    function dbdeletequotation(qid){
        document.getElementById('dbdeletebutton').href = "quotationdbdelete.php?id="+qid;
    }

    function dbdeleteallquotation(){
        document.getElementById('dbdeletebutton').href = "quotationdbdelete.php?id=all";
    }

    $(document).ready(function(){
        $('#pendingtable').dataTable();
    });

    $(document).ready(function(){
        $('#accepttable').dataTable();
    });

    $(document).ready(function(){
        $('#rejecttable').dataTable();
    });

    $(document).ready(function(){
        $('#dlttable').dataTable();
    });



</script>
            

<?php include 'footer.php'?>