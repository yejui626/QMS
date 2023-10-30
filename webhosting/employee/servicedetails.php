<?php
include '../qmssession.php';

if(!session_id())
{
    session_start();
}
include '../dbconnect.php';
include 'header.php'; 

$u_userID=$_SESSION['u_userID'];

if(isset($_GET['id'])){
  $sid = $_GET['id'];
}
$sql="  SELECT * FROM tb_service 
    LEFT JOIN tb_user ON tb_service.s_userID = tb_user.u_userID
    LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
    LEFT JOIN tb_status ON tb_service.s_statusID = tb_status.st_statusID
    LEFT JOIN tb_type ON tb_service.s_typeID = tb_type.t_typeID
    LEFT JOIN tb_address ON tb_customer.c_addressID = tb_address.a_addressID
    WHERE s_serviceID = $sid";

$result=mysqli_query($con,$sql);


$sqlfeedback = "SELECT * FROM tb_feedback
              LEFT JOIN tb_service ON tb_feedback.f_serviceID = tb_service.s_serviceID
              LEFT JOIN tb_customer ON tb_service.s_custID = tb_customer.c_custID
              WHERE s_serviceID = '$sid'";

              $resultfeedback = mysqli_query($con, $sqlfeedback);

$row=mysqli_fetch_array($result);
?>
<head>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head> 
<style>
.modal-dialog {
    height: 50%;
    width: 50%;
    margin: auto
}

.modal-header {
    color: white;
    background-color: #007bff
}

textarea {
    border: none;
    box-shadow: none !important;
    -webkit-appearance: none;
    outline: 0px !important
}

.openmodal {
    margin-left: 35%;
    width: 25%;
    margin-top: 25%
}

.icon1 {
    color: #007bff
}


div.stars{
  width: 270px;
  display: inline-block;

}
input.star{
  display: none;
}
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
input.star:checked ~ label.star:before {
  content:'\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color:#FE7;
  text-shadow: 0 0 20px #952;
}
input.star-1:checked ~ label.star:before {
  color: #F62;
}
label.star:hover{
  transform: rotate(-15deg) scale(1.3);
}
label.star:before{
  content:'\f006';
  font-family: FontAwesome;
}
.rev-box{
  overflow: hidden;
  height: 0;
  width: 100%;
  transition: all .25s;
}
textarea.review{
  background: #222;
  border: none;
  width: 100%;
  max-width: 100%;
  height: 100px;
  padding: 10px;
  box-sizing: border-box;
  color: #EEE;
}
label.review{
  display: block;
  transition:opacity .25s;
}
input.star:checked ~ .rev-box{
  height: 125px;
  overflow: visible;
}
.card {
    border-radius: 5px;
    background-color: #fff;
    padding-left: 60px;
    padding-right: 60px;
    margin-top: 30px;
    padding-top: 30px;
    padding-bottom: 30px
}
</style>

<div class="page-breadcrumb bg-white">
  <div class="row align-items-center">
      <div class = "col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h4 class="page-title"> 
            <a href="service.php" style="color:black;">Service</a>
            / 
            <a href="servicedetails.php?id=<?php echo $sid;?>" style="color:black;">Service Details</a>
          </h4>
      </div>
  </div>
</div>

<div class="container-fluid">
  <h3><strong>Service Details</strong></h3>
<div class="pt-1 card-body white-box row justify-content-center">

<div class="table-responsive">
    <table class="table text-nowrap">
      <tr>
        <td><strong>Service ID</strong></td>
        <td><?php echo $sid; ?></td>
      </tr>

      <tr>
        <td><strong>Service Type</strong></td>
        <td><?php 
        echo $row['t_details']; ?></td>
      </tr>

      <tr>
        <td><strong>User Name</strong></td>
        <td><?php echo $row['u_username']; ?></td>
      </tr>

      <tr>
        <td><strong>Customer Name</strong></td>
        <td><?php echo $row['c_customerName']; ?></td>
      </tr>

      <tr>
        <td><strong>Customer Phone</strong></td>
        <td><?php echo $row['c_phoneNo']; ?></td>
      </tr>

      <tr>
        <td><strong>Address</strong></td>
        <td><?php 
              echo $row['a_street']; echo"<br>" ; echo $row['a_postcode']; echo", " ; echo $row['a_city']; echo"<br>" ; echo $row['a_state'];
            ?></td>
      </tr>

      <tr>
        <td><strong>Request date</strong></td>
        <td><?php echo date("d/m/y", strtotime($row['s_requestDate'])); ?></td>
      </tr>

      <tr>
        <td><strong>Complete date</strong></td>
        <?php 
            if ($row['s_completeDate'] == '0000-00-00 00:00:00'){
                echo "<td>-</td>";
              }else{
                echo "<td>".date("d/m/y", strtotime($row['s_completeDate']))."</td>";
              }
        ?>
      </tr>

      <tr>
        <td><strong>Service Status</strong></td>
        <td><?php 
            if($row['s_statusID']=='1'){
              echo "<span class='fw-normal text-warning'>".$row['st_details']."</span>";
            }else if ($row['s_statusID']=='2'){
              echo "<span class='fw-normal text-danger'>".$row['st_details']."</span>";
            }else if ($row['s_statusID']=='3'){
              echo "<span class='fw-normal text-success'>".$row['st_details']."</span>";
            }else if ($row['s_statusID']=='4'){
              echo "<span class='fw-normal text-primary'>".$row['st_details']."</span>";
            }else if ($row['s_statusID']=='5'){
              echo "<span class='fw-normal text-secondary'>".$row['st_details']."</span>";
            } ?></td>
      </tr> 

      <tr>
        <td><strong>Service Details</strong></td>
        <td><?php echo $row['s_details']; ?></td>
      </tr>         
    </table>
<div class="row">
    <div class="col-lg-6">
      
    </div>
    <div class="col-lg-6">
      <?php
      if($row['s_statusID']=='1'){
      echo"
          <a class='btn btn-success btn-lg' style='float:right' href='serviceapprove.php?id=".$sid."''>Accept Service</a>
          <a class='btn btn-danger btn-lg' style='float:right' href='servicereject.php?id=".$sid."''>Reject Service</a>";
            }
      ?>
    </div>
</div>
<br>
</div>
</div>

<?php 
if($row['s_statusID']!='1' && $row['s_statusID']!='2')
{
echo"
                <div class='row'>
                    <div class='col-md-12'>

                      <div class='row' >
                        <div class='col-5'>
                          <h3 style='padding-bottom:15px;'><strong>Service Quotation</strong></h3>
                        </div>";

                        if($row['s_statusID'] != 4){
                          echo"<div class='col-4 ms-auto'>
                            <a class='btn btn-primary btn-lg' style='display:inline; position:relative; float:right; margin-bottom:10px;' href='quotationadd.php?id=".$sid."'>+ Add Quotation</a>
                          </div>";
                        }

                                
echo"                 </div>
                        <div class='white-box row justify-content-center'>
                            <div class='table-responsive text-center'>
                                <table class='table table-hover' id='quotationtable'>
                                    <thead>
                                        <tr>
                                            <th class='border-top-0'>No.</th>
                                            <th class='border-top-0'>Quotation ID</th>
                                            <th class='border-top-0'>Date </th>
                                            <th class='border-top-0'>Status</th>
                                            <th class='border-top-0'>Action</th>";
                                            
                                            if($row['s_statusID'] == 3){
                                              echo "<th class='border-top-0'></th>";
                                            }

                                echo"   </tr>
                                    </thead>
                                    <tbody>";
                                            $i = 1;

                                            $sql1 = "SELECT * FROM tb_quotation
                                                    LEFT JOIN tb_service ON tb_quotation.q_serviceID = tb_service.s_serviceID
                                                    LEFT JOIN tb_status ON tb_quotation.q_statusID = tb_status.st_statusID
                                                    WHERE q_statusID != '5' AND q_serviceID = '$sid'
                                                    ORDER BY q_statusID DESC;  
                                                    ";

                                            $result1 = mysqli_query($con, $sql1);

                                            if(mysqli_num_rows($result1)>0){
                                            while ($row1 = mysqli_fetch_array($result1)){

                                                echo "<tr>";
                                                echo "<td> ".$i++."</td>";
                                                echo "<td> ".$row1['q_quotationID'].   
                                                    "&nbsp <a class='qview' href='quotationview.php?id=".$row1['q_quotationID']."' title='View Quotation' > 
                                                        <i class='fas fa-eye' aria-hidden='true'></i></a>";
                                                "</td>";
                                                echo "<td> ".$row1['q_date']."</td>";
                                                if($row1['q_statusID']=='1'){
                                                  echo "<td><span class='fw-normal text-warning'>".$row1['st_details']."</span></td>";
                                                }else if ($row1['q_statusID']=='2'){
                                                  echo "<td><span class='fw-normal text-danger'>".$row1['st_details']."</span></td>";
                                                }else if ($row1['q_statusID']=='3'){
                                                  echo "<td><span class='fw-normal text-success'>".$row1['st_details']."</span></td>";
                                                }
                                                
                                                if($row1['q_statusID'] == 1){
                                                  echo "<td>
                                                <a class='qaccept' onClick='acceptquotation(".$row1['q_quotationID'].");' type='button' title='Accept Quotation' data-bs-toggle='modal' data-bs-target='#qaccept'> 
                                                    <i class='fas fa-check-square fa-lg' aria-hidden='true'></i>
                                                </a> &nbsp
                                                <a class='qreject' onClick='rejectquotation(".$row1['q_quotationID'].");' type='button' title='Reject Quotation' data-bs-toggle='modal' data-bs-target='#qreject'> 
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
                            <a class='dropdown-item' onClick='modifyquotation(".$row1['q_quotationID'].");' type='button' title='Modify Quotation' data-bs-toggle='modal' data-bs-target='#modify'><i class='fas fa-edit' aria-hidden='true' style='color:blue; padding-right:10px;'></i>Modify Quotation</a>

                            <a class='dropdown-item' onClick='deletequotation(".$row1['q_quotationID'].");' type='button' title='Delete Quotation' data-bs-toggle='modal' data-bs-target='#dlt'><i class='fas fa-trash-alt' aria-hidden='true' style='color:red; padding-right:15px;'></i>Delete Quotation</a>
                          </div>
                        </div>
                      </div>
                    </td>";
                                                }
                                                else{
                                                  echo "<td>
                                          

                                                    <a class='qreject' onClick='deletequotation(".$row1['q_quotationID'].");' type='button' title='Delete Quotation' data-bs-toggle='modal' data-bs-target='#dlt'><i class='fas fa-trash-alt fa-lg' aria-hidden='true'></i></a>
                                                </td>";

                                                }
                                                    
                                              
                                                echo "</tr>";
                                            }
                                        }
                                        
                               echo"                                       
                                    </tbody>
                                </table>
                            </div>

                            
                <!-- ============================================================== -->
                <!-- End Table -->
                <!-- ============================================================== -->

                        </div>
                    </div>
                </div>

            <!--Modal Launch Button-->";



if($row['s_statusID']=='4'){
  echo"

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class='row'>
                    <div class='col-md-12'>

                            <div class='d-md-flex mb-3'>
                                <h3><strong>Service Feedback</strong></h3>
                                <div class='col-md-2 col-sm-2 col-xs-6 ms-auto'>";
                                  
                    if(mysqli_num_rows($resultfeedback)<=0){
                    echo"               
                                  <button type='button' class='btn btn-primary btn-lg' data-bs-toggle='modal' data-bs-target='#exampleModal' style='float:right' >Give Feedback</button>";}
                                


echo"
      <!-- Modal -->
      <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <!--Modal-->
      <div class='modal-dialog'>
          <!--Modal Content-->
          <div class='modal-content'>
              <!-- Modal Header-->
              <div class='modal-header'>
                  <h3>Feedback Request</h3>
                  <!--Close/Cross Button--> <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div> <!-- Modal Body-->
              <div class='modal-body text-center'> <i class='far fa-file-alt fa-4x mb-3 animated rotateIn icon1'></i>
                  <h3>Your opinion matters</h3>
                  <h5>Help us improve our service? <strong>Give us your feedback.</strong></h5>
                  <hr>
                  <h6>Your Rating</h6>
              </div> <!-- Radio Buttons for Rating-->
              <form class='form-horizontal form-material' method='POST' action='feedbackcreate.php'>
              <div class='form-group' style='text-align:center'>
                <div class='stars'>
                  <input class='star star-5'  id='star-5' type='radio' name='frating' value='5'/>
                  <label class='star star-5' for='star-5'></label>
                  <input class='star star-4' id='star-4' type='radio' name='frating' value='4'/>
                  <label class='star star-4' for='star-4'></label>
                  <input class='star star-3' id='star-3' type='radio' name='frating' value='3'/>
                  <label class='star star-3' for='star-3'></label>
                  <input class='star star-2' id='star-2' type='radio' name='frating' value='2'/>
                  <label class='star star-2' for='star-2'></label>
                  <input class='star star-1' id='star-1' type='radio' name='frating' value='1'/>
                  <label class='star star-1' for='star-1'></label>
                </div>
              </div>

              <!--Text Message-->
              <div class='text-center'>
                  <h4>What could we improve?</h4>
              </div> <textarea name ='fdetails' class='form-control' id='exampleFormControlTextarea1' rows='3' placeholder='Your Message' required></textarea> 

              <input type='hidden' name='fsid' class='form-control' id='fsid' value=".$sid.">

              <!-- Modal Footer-->
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                    <input type='submit' class='btn btn-primary name='signup_submit' id=submit value='Send' required/>
                  </div> 
            </form>
          </div>
      </div>
  </div>


                                </div>
                            </div>";

}                


                             while ($rowfeedback = mysqli_fetch_array($resultfeedback)){
                                echo"
                                  <div class='card'> 
                                    <div class='row'>         
                                      <div class='col-lg-6' style='margin-left: auto; margin-right: 0;'>            
                                        <div class='row d-flex'>
                                          <div class='d-flex flex-column'>
                                            <h3 class='mt-2 mb-0'>".$rowfeedback['c_customerName']."
                                            </h3>
                                            <div>
                                              <p class='text-left'>
                                                <span class='text-muted'>"
                                                  .$rowfeedback['f_rating'].".0</span>
                                                  ".str_repeat('<i class="fa fa-star" aria-hidden="true" style=" color: #fbc634;"></i>', $rowfeedback['f_rating']) ."
                                              </p>   
                                            </div>
                                          </div>
                                          <div class='row text-left'>
                                            <h4 class='blue-text mt-3'>
                                              '".$rowfeedback['f_details']."'
                                            </h4>
                                          </div>
                                        </div>
                                      </div>
                                      
                                        <div class='col-lg-6' >
                                            <a class='qreject' onClick='deletefeedback(".$rowfeedback['s_serviceID'].");' type='button' title='Delete Feedback' data-bs-toggle='modal' data-bs-target='#dlt' style='position: absolute; bottom: 20px; right:50px;'><i class='fas fa-trash-alt fa-lg' aria-hidden='true'></i></a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>                       
                                  ";
                                              }
                                            
                                            echo"                                       
                                    </tbody>
                                </table>
                            </div>

                            
                <!-- ============================================================== -->
                <!-- End Table -->
                <!-- ============================================================== -->

                        </div>
                    </div>
                </div>

                <!-- End Container -->
                <!-- ============================================================== -->
            <!--Modal Launch Button-->";
      
}
?>
 </div>


<!--Copy Quotation Here -->
<!-- Modal Accept?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="qaccept" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon"></i>
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
              <div class="modal-body text-center"><i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon"></i>
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
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon"></i>
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
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon"></i>
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

    function deletefeedback(sid){
        document.getElementById('deletebutton').href = "feedbackdelete.php?id="+sid;
    }

    $(document).ready(function(){
      $('#quotationtable').dataTable();
    });

</script>

<?php include 'footer.php'; ?> 