<?php include 'header.php'; 

if(isset($_GET['id'])){
   $qid = $_GET['id'];
}

//Retrieve booking (JOIN)
$sql = "SELECT * FROM tb_quotation 
        LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
        LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
        LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
        WHERE q_quotationID = '$qid'
        ";

$result = mysqli_query($con, $sql);
$cname = mysqli_fetch_array($result);

?> 


            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                        <h4 class="page-title"> 
                            <a href="quotation.php" style="color:black;">Quotation</a>
                            /
                            <a href="quotationview.php?id=<?php echo $qid;?>" style="color:black;">View Quotation</a>
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
                        <p style="padding-bottom: 10px;">
                            <a class="btn btn-light" href="servicedetails.php?id=<?php echo $cname['q_serviceID'] ?>" > 
                                <span><i class="fas fa-arrow-left" aria-hidden="true"></i></span>
                                <span class="hide-menu">Go to service</span></a>
                        </p>

                        <form method="POST" action="quotationmodifyprocess.php">
                            <p>
                                <label style="float: left; padding-right:20px;">
                                    <b> Customer Name : </b>
                                </label>
                                <?php 
                                    echo $cname["c_customerName"];
                                ?>
                                
                            </p>
                            <p>
                                <label style="float: left; padding-right: 58px;">
                                    <b> Service ID : </b>
                                </label>
                                <?php
                                    echo $cname["q_serviceID"];  
                                    echo " ( ";
                                    if ($cname['s_statusID']=='3'){
                                        echo "<span class='fw-normal text-secondary'><b>Not Completed</b></span>";
                                    }else if ($cname['s_statusID']=='4'){
                                        echo "<span class='fw-normal text-success'><b>Completed</b></span>";
                                    }else if ($cname['s_statusID']=='5'){
                                        echo "<span class='fw-normal text-danger'><b>Cancelled</b></span>";
                                    }
                                    echo " ) ";               
                                ?>
                            </p>
                            <p>
                                <label style="float: left; padding-right:20px;">
                                    <b> Quotation Status : </b>
                                </label>
                                <?php 
                                    if($cname['q_statusID']=='1'){
                                        echo "<span class='fw-normal text-warning'><b>".$cname['st_details']."<b></span>";
                                    }else if ($cname['q_statusID']=='2'){
                                        echo "<span class='fw-normal text-danger'><b>".$cname['st_details']."</b></span>";
                                    }else if ($cname['q_statusID']=='3'){
                                        echo "<span class='fw-normal text-success'><b>".$cname['st_details']."</b></span>";
                                    }else if ($cname['q_statusID']=='5'){
                                        echo "<span class='fw-normal text-secondary'><b>Deleted</b></span>";
                                    }
                                ?>
                                
                                <?php
                                $status = $cname['q_statusID'];
                                if ($status == '1'){
                                    echo"<a class='qaccept' onClick='acceptquotation(".$cname['q_quotationID'].");' type='button' title='Accept Quotation' data-bs-toggle='modal' data-bs-target='#qaccept' style='padding-left:20px;'> 
                                        <i class='fas fa-check-square fa-lg' aria-hidden='true'></i>
                                        </a> &nbsp
                                        <a class='qreject' onClick='rejectquotation(".$cname['q_quotationID'].");' type='button' title='Reject Quotation' data-bs-toggle='modal' data-bs-target='#qreject'> 
                                        <i class='fas fa-window-close fa-lg' aria-hidden='true'></i>
                                        </a>";}
                                else{

                                } 
                                ?>
                                
                            </p>
 
                        <div id="printarea" class="white-box">
                            
                         
                            <div class="d-md-flex mb-3">                              
                                <div class="left">                                                                      
                                    <p>
                                        <label style="float: left; margin-right:20px;">
                                            <b> Quotation ID : </b>
                                        </label>
                                        <?php
                                            echo $cname["q_quotationID"];
                                        ?>

                                    </p>

                                    <p>
                                        <label style="float: left; margin-right:20px;">
                                            <b> M/S : </b>
                                        </label>

                                        <?php

                                        $cid = $cname['c_custID'];
                                        $sql2 = "SELECT * FROM tb_address WHERE a_addressID = (SELECT c_addressID FROM tb_customer WHERE c_custID = '$cid')";
                                        $result2 = mysqli_query($con, $sql2);
                                        $caddress = mysqli_fetch_array($result2);

                                        echo'<label>'.$caddress["a_street"].'</label>';
                                        echo'<br>';
                                        echo'<label style="padding-left: 58px;">'.$caddress["a_postcode"].', </label>';
                                        echo'<label style="padding-left: 10px;">'.$caddress["a_city"].', </label>';
                                        echo'<br>';
                                        echo'<label style="padding-left: 58px;">'.$caddress["a_state"].' </label>';

                                        ?>
                                    </p>

                                    <p>
                                        <label style="float: left; padding-right: 20px;">
                                            <b> RE : </b>
                                        </label>

                                        <?php                                           
                                            echo "<span class='fw-normal' style='white-space: pre-line'>".$cname['q_topic']."</span>";
                                        ?>
                                    </p>                                    

                                    
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6 ms-auto">
                                    <p>
                                        <label style="float: left; margin-right: 10px;" >
                                            <b> Date : </b>
                                        </label>

                                        <?php                                           
                                            echo $cname["q_date"];
                                        ?>
                                    </p>
                                </div>
                            </div>

                            

                            <div class="table-responsive">
                                <table class="table table-bordered" id="emptbl">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No.</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Qty</th>
                                            <th class="border-top-0">Qty Unit</th>
                                            <th class="border-top-0">Unit Price </th>
                                            <th class="border-top-0">Amount (RM)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <?php
                                                $sql3 = "SELECT * FROM tb_item WHERE i_quotationID = '$qid'";
                                                $result3 = mysqli_query($con, $sql3);
                                                $i = 1;
                                                
                                                while($citem = mysqli_fetch_array($result3)){
                                                    echo "<tr>";
                                                    echo "<td> ".$i++."</td>";
                                                    echo "<td> ";
                                                        
                                                        echo "<span class='fw-normal' style='white-space: pre-line'>".$citem[2]."</span>";

                                                    echo "</td>";

                                                    echo "<td> ";
                                                        echo $citem[3];
                                                    echo "</td>";

                                                    echo "<td> ";
                                                        
                                                        if ($citem[4]==1){
                                                            echo "nos";
                                                        }
                                                        else if ($citem[4]==2){
                                                            echo "los";
                                                        }
                                                        else if ($citem[4]==3){
                                                            echo "unit";
                                                        }
                                                        else{
                                                            echo "set";
                                                        }

                                                    echo "</td>";

                                                    echo "<td> ";
                                                        echo $citem[5];
                                                    echo "</td>";

                                                    echo "<td> ";
                                                        echo $citem[6];
                                                    echo "</td>";
                                                }
                                            ?>
                                        </tr>                               
                                    </tbody>
                                      
                                </table>
                                <table class="table table-hover">
                                    <tfoot>
                                    <tr>
                                        <th id="total" colspan="0" style="text-align: right; padding-right:20px;">Total (RM) : </th>
                                        <td style="padding-left:0px; width:150px;">
                                            <?php echo $cname["q_totalAmount"] ?>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>  
                            </div>
                            

                        </div>
                    </div>
                </div>
                </form>

                <div class="d-md-flex mb-3">
                    
                    <div class="col-lg-6">
                        <?php
                        if ($status == '1'){
                            echo '<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modify" style="margin-right:20px;">Modify</button>';
                        } 
                        
                        if ($status == '5'){
                            echo '<button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#dltdb">Delete</button>';
                        }
                        else{
                            echo '<button type="button" class="btn btn-warning btn-lg" data-bs-toggle="modal" data-bs-target="#dlt">Delete</button>';
                        }
                        
                        ?>
                    </div>

                    <div class="col-lg-6" style="margin-left:auto; margin-right: 0px;">
                       

                        <a type="button" class="btn btn-info btn-lg" href="quotationprint.php?id=<?php echo $cname['q_quotationID'] ?>">Print</a>
                        
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
                    <a href="quotationcancel.php?id=<?php echo $cname['q_quotationID'] ?>" class="btn btn-danger btn-lg" tabindex="0" > 
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
                    <a id="dbdeletebutton" href="quotationdbdelete.php?id=<?php echo $cname['q_quotationID'] ?>" class="btn btn-danger btn-lg" tabindex="0" > 
                        Delete
                    </a>
                    
              </div>
              <!-- Modal Footer-->

          </div>
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
                    <a href="quotationmodify.php?id=<?php echo $cname['q_quotationID'] ?>" class="btn btn-primary btn-lg" tabindex="0" > 
                        Modify
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

                    <input type="hidden" name="qid" class="form-control" value="<?php echo $qid;?>"> 
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
                <a type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px;width:85px;">
                        No
                    </a> 
                    <a href="quotationaccept.php?id=<?php echo $cname['q_quotationID'] ?>" class="btn btn-success btn-lg" tabindex="0" > 
                        Accept
                    </a>
                    
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

<!--Save changes -->
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"savesuccess")==true){
        
 
    echo '<div class="col-lg-6">';
    echo '<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
    echo '<div class="modal-dialog">
             
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>Changes Saved!</h3>
                  </div> 

                  <div class="modal-body text-center">
                        <a class="btn btn-primary btn-lg" href="quotationview.php?id='.$cname["q_quotationID"].'">
                            OK
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>'; 
  }
?> 

<!--Add quotation -->
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"addsuccess")==true){
        
 
    echo '<div class="col-lg-6">';
    echo '<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
    echo '<div class="modal-dialog">
             
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>Quotation Added!</h3>
                  </div> 

                  <div class="modal-body text-center">
                        <a class="btn btn-primary btn-lg" href="quotationview.php?id='.$cname["q_quotationID"].'">
                            OK
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>'; 
  }
?> 

<!--Accept quotation -->
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"acceptsuccess")==true){
        
 
    echo '<div class="col-lg-6">';
    echo '<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
    echo '<div class="modal-dialog">
             
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>Quotation Accepted!</h3>
                  </div> 

                  <div class="modal-body text-center">
                        <a class="btn btn-primary btn-lg" href="quotationview.php?id='.$cname["q_quotationID"].'">
                            OK
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>'; 
  }
?> 

<!--Reject quotation -->
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"rejectsuccess")==true){
        
 
    echo '<div class="col-lg-6">';
    echo '<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
    echo '<div class="modal-dialog">
             
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>Quotation Rejected!</h3>
                  </div> 

                  <div class="modal-body text-center">
                        <a class="btn btn-primary btn-lg" href="quotationview.php?id='.$cname["q_quotationID"].'">
                            OK
                        </a> 
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>'; 
  }
?>

<!--Delete quotation -->
<?php 
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl,"deletesuccess")==true){
        
 
    echo '<div class="col-lg-6">';
    echo '<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
    echo '<div class="modal-dialog">
             
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <h3>Quotation Deleted!</h3>
                  </div> 

                  <div class="modal-body text-center">
                        <a class="btn btn-primary btn-lg" href="quotation.php">
                            Back to Quotation
                        </a>
                        <a class="btn btn-secondary btn-lg" href="servicedetails.php?id='.$cname["q_serviceID"].'">
                            Back to Service
                        </a>  
                  </div>
                  

              </div>
          </div>
        </div>
          
    </div>'; 
  }
?>  

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

<script>

    function reset(){
        document.getElementById('ReasonText').value = "";
    }

</script>

<?php include 'footer.php'?>