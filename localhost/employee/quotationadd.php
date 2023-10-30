<?php include 'header.php'; 

if(isset($_GET['id'])){
    $sid = $_GET['id'];
}
//Retrieve booking (JOIN)
$sql = "SELECT * FROM tb_service
        WHERE s_serviceID = '$sid'
        ";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM tb_customer 
         WHERE c_custID = (SELECT s_custID FROM tb_service WHERE s_serviceID = '$sid')";
$result1 = mysqli_query($con, $sql1);
$cname = mysqli_fetch_array($result1);

$tdate = date('Y-m-d');

?> 
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                        <h4 class="page-title"> 
                            <a href="quotation.php" style="color:black;">Quotation</a>
                            /
                            <a href="quotationadd.php?id=<?php echo $qid;?>" style="color:black;">Add new Quotation</a>
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
                            <a class="btn btn-light" href="servicedetails.php?id=<?php echo $sid ?>" > 
                                <span><i class="fas fa-arrow-left" aria-hidden="true"></i></span>
                                <span class="hide-menu">Go to service</span></a>
                        </p>

                        <form method="POST" action="quotationaddprocess.php">
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
                                    echo $sid;   

                                    echo '<input name="sid" type="text" class="form-control" value="'.$sid.'" hidden>' 
                                ?>


                            </p>

                            <p>
                                <label style="float: left; padding-right: 27px;">
                                    <b> Service Details : </b>
                                </label>
                                <?php
                                    echo $row["s_details"];                 
                                ?>
                            </p>

 
                        <div class="white-box">
                            
                         
                            <div class="d-md-flex mb-3">                              
                                <div class="left">                                                                      
                                    <p>
                                        <label style="float: left; margin-right:20px;">
                                            <b> Ref No. : </b>
                                        </label>
                                        <input name="qid" type="text" placeholder="Quotation ID" class="form-control" style="width:200px; position:relative; bottom:5px;" disabled >
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

                                    
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-6 ms-auto">
                                    <p>
                                        <label style="float: left; margin-right: 10px;" >
                                            <b> Date : </b>
                                        </label>
                                        <input name="date" type="date" placeholder="Quotation ID" class="form-control"  style="width:200px; position:relative; bottom:5px;" value="<?php echo $tdate; ?>" min="<?php echo $tdate; ?>" required>
                                    </p>
                                </div>

                            </div>
                            <div class="row">
                                    <p>
                                        <label style="float: left; margin-right:20px;">
                                            <b> RE : </b>
                                        </label>
                                        <textarea name ="topic" class="form-control"  rows="1" placeholder="Topic" style="width: 50%; position:relative; bottom:5px;" required ></textarea>
                                    </p> 
                                </div>
                    
                            <div class="table-responsive">
                                <table class="table table-hover" id="emptbl">
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
                                            <td id="col0">
                                                1
                                            </td>
                                            
                                            <td id="col1">
                                                
                                                <textarea id="item1" name ="item[]" class="form-control"  rows="1" placeholder="item" required></textarea>

                                            </td>
                                            <td id="col2" style="width:110px;">
                                                <input id = "qty1" name="qty[]" type="number" min="0" placeholder="quantity" class="form-control" style="width:100px;" onkeyup="calc();" required>
                                                
                                            </td>
                                            <td id="col3">
                                                <select id = "unit1" name="unit[]" class="form-select shadow-none p-1 border-1" style="width:100px; " required>
                                                    <option value="" disabled selected hidden>-none-</option>
                                                    <option value="1">nos</option> 
                                                    <option value="2">lot</option>
                                                    <option value="3">unit</option>
                                                    <option value="4">set</option>
                                                </select> 

                                            </td>

                                            <td id="col4">
                                                <input id="price1" name="price[]" type="number" min="0" step="0.01" placeholder="unit price" class="form-control" style="width:100px;" onkeyup="calc();" required>
                                            </td>
                                            <td id="col5">
                                                <input id="amount1" name="amount[]" type="number" min="0" step="0.01"placeholder="Amount" class="form-control" style="width:100px;" onkeyup="calcTotal();"required>
                                            </td>           
                            
                                        </tr>                                       
                                    </tbody>
                                      
                                </table>
                                <table class="table table-hover">
                                    <tfoot>
                                    <tr>
                                        <th id="total" colspan="0" style="text-align: right; padding-right:20px;">Total (RM) : </th>
                                        <td style="padding-left:0px; width:150px;">
                                            <input id="totalAmount" name="total" type="number" min="0" step="0.01" placeholder="Amount" class="form-control" style="width:200px;" required>

                                            <input id="nrow" name="rowCount" type="text" class="form-control" value="1" hidden >
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>  
                            </div>

                        </div>

                    
                            <div class="d-md-flex mb-3">  
                                <div class="col-6" >
                                    
                                    <button type="button" class="btn btn-success btn-lg" onclick="addRows()" style="padding-right:20px;">
                                        ADD Item
                                    </button>
                                
                                    <button type="button" class="btn btn-danger btn-lg" onclick="deleteRows()" style="margin-right:auto;"> 
                                         DELETE Item
                                    </button>
                                    
                                </div>

                                <div class="col-2" style="margin-left: auto; margin-right: 80px;">
                                    <input type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" value="ADD Quotation" />

                                    <input id="submitquotation" type="submit" class ="hidden" hidden/>
                                </div>           
                            </div>  
                        
                    </div>
                </div>
                </form>
<!-- Modal Add ?-->
<div class="col-lg-6">
      
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position:fixed; top:200px;">
      <!--Modal-->
      <div class="modal-dialog">
          <!--Modal Content-->
          <div class="modal-content">
              <div class="modal-body text-center"> <i class="far fa-question-circle fa-4x mb-3 animated rotateIn icon1"></i>
                  <h3>Do you want to add the quotation?</h3>
              </div> 

              <div class="modal-body text-center">
                <label type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" style="margin-right: 10px;">
                        Close
                    </label> 
                    <label for="submitquotation" class="btn btn-primary btn-lg" tabindex="0" > 
                        Add 
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

<script type="text/javascript">
function addRows(){ 
    var table = document.getElementById('emptbl');
    var rowCount = table.rows.length;
    document.getElementById('nrow').value = rowCount;
    var cellCount = table.rows[0].cells.length; 
    var row = table.insertRow(rowCount);
    for(var i =0; i <= cellCount; i++){
        if(i == 0){
            var cell0 = row.insertCell(i);
            cell0.innerHTML = rowCount;
        }
        else if(i == 1){
            var cell1 = row.insertCell(i);
            cell1.innerHTML = '<td id="col1"><textarea id="item'+rowCount+'" name ="item[]" class="form-control"  rows="1" placeholder="item" required></textarea></td>';
        }
        else if(i == 2){
            var cell2 = row.insertCell(i);
            cell2.innerHTML = '<td id="col2" style="width:110px;"><input id = "qty'+rowCount+'" name="qty[]" type="number" min="0" placeholder="quantity" class="form-control" style="width:100px;" onkeyup="calc();" required></td>';
        }
        else if(i == 3){
            var cell3 = row.insertCell(i);
            cell3.innerHTML = '<td id="col3"><select id = "unit'+rowCount+'" name="unit[]" class="form-select shadow-none p-1 border-1" style="width:100px; " required><option value="" disabled selected hidden>-none-</option><option value="1">nos</option><option value="2">lot</option><option value="3">unit</option><option value="4">set</option></select></td>';
        }
        else if(i == 4){
            var cell4 = row.insertCell(i);
            cell4.innerHTML = '<td id="col4"><input id="price'+rowCount+'" name="price[]" type="float" min="0" step="0.01" placeholder="unit price" class="form-control" style="width:100px;" onkeyup="calc();" required></td>';
        }
        else if(i == 5){
            var cell5 = row.insertCell(i);
            cell5.innerHTML='<td id="col5"><input id="amount'+rowCount+'" name="amount[]" type="float" min="0" step="0.01"placeholder="Amount" class="form-control" style="width:100px;" onkeyup="calcTotal();"></td>';
        } 
    }  
}

function deleteRows(){
    var table = document.getElementById('emptbl');
    var rowCount = table.rows.length;
    if(rowCount > '2'){
        document.getElementById('nrow').value = rowCount-2;
        var row = table.deleteRow(rowCount-1);
        rowCount--;
    }
    else{
        alert('There should be atleast one row');
    }
    
}

var calc = function() {
    var table = document.getElementById('emptbl');
    var rowCount = table.rows.length;
    var total = 0;
    for (var i=1; i<rowCount; i++){
        var amount = document.getElementById('price'+i).value * document.getElementById('qty'+i).value;     
        document.getElementById('amount'+i).value = amount.toFixed(2);
        total += amount;
    }

    document.getElementById('totalAmount').value = total.toFixed(2);
    
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
</script>



<?php include 'footer.php'?>