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

//Retreive customer
$sql="  SELECT * FROM tb_customer
        RIGHT JOIN tb_address on tb_customer.c_addressID= tb_address.a_addressID
        LEFT JOIN tb_user ON tb_customer.c_userID = tb_user.u_userID
        WHERE c_userID =$u_userID AND c_statusID= '6' ";

$resultcount = 0;
$result=mysqli_query($con,$sql);

$fullUrl3 = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl3,"alert=addcustomer")==true){
    echo '<script>alert("Add Customer Successfully")</script>';
  }

 ?> 



   <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> 
                            <a href="quotation.php" style="color:black;">Customer</a>
                        </h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

<div class="container-fluid">
    <div class="text-end">
    <button type='button'  class="btn btn-primary btn-lg" onclick="location.href='addcustomer.php'"> + Add Customer</button>
    </div><br>
    
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                         <h3 class="box-title">My Addresses</h3>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap table-hover" id="custtable">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th scope="border-top-0">Customer Name</th>
                                            <th scope="border-top-0">Phone No</th>
                                            <th scope="border-top-0">Addresses</th>
                                            <th scope="border-top-0">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        <?php 
                 while ($row=mysqli_fetch_array($result) )
                 {
                  $resultcount = $resultcount +1;
                echo "<tr>";
                echo "<td>".$resultcount."</td>";
                echo "<td>".$row['c_customerName']."</td>";
                echo "<td>".$row['c_phoneNo']."</td>";
                echo "<td>".$row['a_street']. "<br>" .$row['a_postcode']. " ".$row['a_city']. "<br>" .$row['a_state']. "</td>";

            

                echo "<td>";
                echo"<a class='qedit' href='customeredit.php?id=".$row['c_custID']."' type='button'> <i class='fas fa-edit' title='Modify' aria-hidden='true'> </i> </a> &nbsp";
            
                 
                 echo"
                <a  class='qreject'  onClick='customerdelete(".$row['c_custID'].")' type='button' title='Delete customer' data-bs-toggle='modal' data-bs-target='#dlt1'><i class='fas fa-trash-alt' aria-hidden='true'></i></a>";
                echo "</td>";
                echo "</tr>";
            
            
        }

        ?>
                                      
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <a id="modifybutton" href="#" class="btn btn-primary btn-lg" tabindex="0" style="margin-right: 10px;"> 
                        Modify
                    </a>
                    <a type="button" class="btn btn-warning btn-lg" data-bs-dismiss="modal">
                        No
                    </a> 
              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>

<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="dlt1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you really want to delete?</h3>
              </div> 

              <div class="modal-body text-center">
                    <a type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px;">
                        No
                    </a> 
                    <a id="deletebutton" href="#" class="btn btn-danger btn-lg" tabindex="0" > 
                        Delete
                    </a>

              </div>
              <!-- Modal Footer-->

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