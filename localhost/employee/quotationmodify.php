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
                            <a href="quotationmodify.php?id=<?php echo $qid;?>" style="color:black;">Modify Quotation</a>
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
                                <span class="hide-menu">Go To Service</span></a>
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

                                    echo '<input name="sid" class="form-control" value="'.$cname["q_serviceID"].'" hidden>';                 
                                ?>
                            </p>

                            <p>
                                <label style="float: left; padding-right: 27px;">
                                    <b> Service Details : </b>
                                </label>
                                <?php
                                    echo $cname["s_details"];                 
                                ?>
                            </p>

                            
 
                        <div class="white-box">
                            
                         
                            <div class="d-md-flex mb-3">                              
                                <div class="left">                                                                      
                                    <p>
                                        <label style="float: left; margin-right:20px;">
                                            <b> Quotation ID : </b>
                                        </label>
                                        <?php     
                                            echo $cname["q_quotationID"];
                                        
                                            echo '<input name="qid" class="form-control" style="width:200px; position:relative; bottom:5px;" value="'.$cname["q_quotationID"].'" hidden>';
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
                                        echo'<label style="padding-left: 58px;">'.$caddress["a_city"].', </label>';

                                        ?>
                                    </p> 
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6 ms-auto">
                                    <p>
                                        <label style="float: left; margin-right: 10px;" >
                                            <b> Date : </b>
                                        </label>

                                        <?php                                           
                                            echo '<input name="date" type="date" class="form-control" style="width:200px; position:relative; bottom:5px;" value="'.$cname["q_date"].'" required>';
                                        ?>
                                    </p>
                                </div>
                            </div>

                            <div class="row">

                                <p>
                                        <label style="float: left; padding-right: 20px;">
                                            <b> RE : </b>
                                        </label>

                                        <?php                                           
                                            echo'<textarea name ="topic" class="form-control"  rows="2" placeholder="Topic" style="width: 50%; position:relative; bottom:5px; white-space: pre-line" required >'.$cname["q_topic"].' </textarea>';
                                        ?>
                                    </p>  
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
                                            <th class="border-top-0">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <?php
                                                $sql3 = "SELECT * FROM tb_item WHERE i_quotationID = '$qid'";
                                                $result3 = mysqli_query($con, $sql3);
                                                $i = 1;
                                                $total = 0.00;
                                                
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
                                                        $total += $citem[6];
                                                    echo "</td>";
                                               
                                                    echo "<td> ";
                                                        echo "<a class='qreject' href='deleteitem.php?id=".$citem['i_itemID']."' title='Delete'> 
                                                    <i class='fas fa-trash-alt' aria-hidden='true'></i></a>";

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
                                            <?php    

                                            $t = number_format((float)$total, 2, '.', '');                                       
                                            echo '<input name="total" type="number" placeholder="Amount" min="0" step="0.01" class="form-control" style="width:200px;" value="'.$t.'" required/>';
                                        ?>

                                            <input id="nrow" name="rowCount" type="text" class="form-control" value="<?php echo $i-1;?>" hidden >
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>  
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#additem">
                                Add Item
                            </button>

                            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float:right;">Save</button>

                            
                            <input id = "submitquotation" type="submit" class ="hidden" hidden/>
                        </div>
                    </div>
                </div>
                </form>

                
<!-- Modal Add item?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="additem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog" style="max-width:700px;">
          <!--Modal Content-->
          <div class="modal-content"> 
              <div class = "modal-header text-center">
                <h3>Add your item here</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                    <form method="POST" action="additem.php?id=<?php echo $cname['q_quotationID']?>">                     
                            <table class="table table-borderless" >         
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Qty</th>
                                            <th class="border-top-0">Qty Unit</th>
                                            <th class="border-top-0">Unit Price </th>
                                            <th class="border-top-0">Amount (RM)</th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                
                                                <textarea id="item" name ="item" class="form-control"  rows="1" placeholder="item" required></textarea>

                                                <input name="qid" class="form-control" value="<?php echo $cname['q_quotationID']?>" hidden>

                                            </td>
                                            <td style="width:110px;">
                                                <input id="qty" name="qty" type="number" placeholder="quantity" min="0" class="form-control" style="width:100px;" onkeyup="calc();" required>
                                                
                                            </td>
                                            <td>
                                                <select id="unit" name="unit" class="form-select shadow-none p-1 border-1" style="width:100px; " required>
                                                    <option value="" disabled selected hidden>-none-</option>
                                                    <option value="1">nos</option> 
                                                    <option value="2">lot</option>
                                                    <option value="3">unit</option>
                                                    <option value="4">set</option>
                                                </select> 

                                            </td>

                                            <td>
                                                <input id="price" name="price" type="number" min="0" step="0.01" placeholder="unit price" class="form-control" style="width:100px;" onkeyup="calc();" required>
                                            </td>
                                            <td>
                                                <input id="amount" name="amount" type="number" placeholder="Amount" min="0" step="0.01" class="form-control" style="width:100px;" required>
                                                <input id = "submititem" type="submit" class ="hidden" hidden/>
                                            </td>                                 
                                        </tr>                                       
                                    </tbody>
                                      
                                </table>
                            
                </form>
              </div>
              <!-- Modal Footer-->
              <div class = "modal-footer text-center">
                    <label for="dltitem" type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" onClick="reset();" style="margin-right: 10px;">
                        Close
                    </label>
                    <label for="submititem" class="btn btn-primary btn-lg" tabindex="0" >
                        Add 
                    </label>
                     
              </div>

          </div>
      </div>
    </div>
</div>


<!-- Modal Save Changes?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you want to save the changes?</h3>
              </div> 

              <div class="modal-body text-center">
                    <label type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px;">
                        Close
                    </label> 
                    <label for="submitquotation" class="btn btn-primary btn-lg" tabindex="0" > 
                        Save 
                    </label>

              </div>
              <!-- Modal Footer-->

          </div>
      </div>
    </div>
</div>


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

        <script>
            var calc = function() {
                var amount = document.getElementById('price').value * document.getElementById('qty').value;     
                document.getElementById('amount').value = amount.toFixed(2);
            }

            var calcTotal = function() {
                var table = document.getElementById('emptbl');
                var rowCount = table.rows.length;
                var total = 0;
                for (var i=1; i<rowCount; i++){
                    total += 1*document.getElementById('amount'+i).value;    
                }
                document.getElementById('totalAmount').value = total.toFixed(2);
                
            }

            function reset(){
                document.getElementById('item').value = "";
                document.getElementById('qty').value = "";
                document.getElementById('unit').value = "";
                document.getElementById('price').value = "";
                document.getElementById('amount').value = "";
            }

        </script> 



<?php include 'footer.php'?>