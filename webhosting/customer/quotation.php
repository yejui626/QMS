<?php include 'header.php'; 

$u_userID=$_SESSION['u_userID'];
//Retrieve booking (JOIN)
$sql = "SELECT * FROM tb_quotation 
        LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
        LEFT JOIN tb_user ON tb_service.s_userID = tb_user.u_userID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        WHERE q_statusID != 5 AND c_userID = $u_userID;
        ";

$result = mysqli_query($con, $sql);


?> 
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                        <h4 class="page-title"> 
                            <a href="quotation.php" style="color:black;">Quotation</a>
                        </h4>
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
                                <h3 class="box-title mb-0" style="font-size:30px;">Recent Quotation</h3>
                                <div class="col-md-3 col-sm-3 col-xs-6 ms-auto" >
                                    <p> Sorted by: 
                                    <select class="form-select shadow-none row border-top" >
                                        <option>Date (newest)</option>
                                        <option>Date (oldest)</option>
                                        <option>Pending</option>
                                        <option>Accepted</option>
                                        <option>Rejected</option>

                                    </select>
                                    </p>
                                </div>
<!--changed here -->
                                <div class="col-md-2 col-sm-2 col-xs-6 ms-auto" >
                                    <a class="btn btn-light" href="quotationadd.php?id=12" > 
                                        <span><i class="fas fa-plus" aria-hidden="true"></i></span>
                                        <span class="hide-menu">Add Quotation</span></a>

                                </div>

                            </div>

                        <div class="white-box">
                            


                            <div class="table-responsive">
                                <table class="table table-hover" id = "data">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No.</th>
                                            <th class="border-top-0">Quotation ID</th>
                                            <th class="border-top-0">Service ID</th>
                                            <th class="border-top-0">Customer Name</th>
                                            <th class="border-top-0">Date </th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            $start = 11;
                                            $end = 20;
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
                                                    "&nbsp <a class='qview' href='serviceview.php?id=".$row['q_serviceID']."' title='View Service'> 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";
                                                echo "<td> ".$row['c_customerName']."</td>";
                                                echo "<td> ".$row['q_date']."</td>";
                                                echo "<td> ".$row['st_details']."</td>";
                                                
                    echo "<td>
                      <div role='group' class='dropdown show'>
                          <a class='text-dark m-0' role='button' href='#''  id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false' >
                            <span class='icon icon-sm'>
                              <svg aria-hidden='true' height='20' width='20' focusable='false' data-prefix='fas' data-icon='ellipsis-h' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>
                                <path fill='currentColor' d='M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z'></path>
                              </svg>
                            </span>
                          </a>
                          <div class='dropdown-menu' aria-labelledby='dropdownMenuLink' >
                            <a class='dropdown-item' href='quotationaccept.php?id=".$row['q_quotationID']."'><i class='fas fa-check' aria-hidden='true' style='color:blue; padding-right:10px;'></i>Accept</a>
                            <a class='dropdown-item' id='toastbtn' href='quotationreject.php?id=".$row['q_quotationID']."'><i class='fas fa-times' aria-hidden='true' style='color:red; padding-right:15px;'></i>Reject</a>
                          </div>
                        </div>
                      </div>
                    </td>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
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
            </div>

<?php include 'footer.php'?>