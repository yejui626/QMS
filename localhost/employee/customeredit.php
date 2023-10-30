<?php include 'header.php'; 

include '../dbconnect.php';
include '../qmssession.php';

if(!session_id())
{
    session_start();
}
$u_username= $_SESSION['u_username']; 
$u_userID=$_SESSION['u_userID'];

//GET customer ID
if(isset($_GET['id']))
{
  $bid=$_GET['id'];
}


$sql="  SELECT * FROM tb_customer
        RIGHT JOIN tb_address ON tb_customer.c_addressID = tb_address.a_addressID
        WHERE c_custID =$bid";

$result=mysqli_query($con,$sql);
$row= mysqli_fetch_array($result);

 ?> 

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <h4 class="page-title"> 
            <a href="customer.php" style="color:black;">Customer</a>
            /
            <a href="customeredit.php?id=<?php echo $bid;?>" style="color:black;">Modify Customer</a>
        </h4>
    </div>
</div>

  <div class="container-fluid" >
  <div class="white-box">

  <form class="form-horizontal" method="POST" action="customereditprocess.php">
    <fieldset>

      <div class="form-group">
        <label for="inputCustomerID" class="col-lg-4 control-label">
          <h5><b>Customer ID:</b> <span style="padding-left: 20px;"><?php echo $bid; ?></span></h5>
        </label>
        
        <input type="text"  class="form-control p-0 " id="inputcustID" name="fcustID" value="<?php echo $row['c_custID'];?>" required hidden /> 
      </div>
      
      <div class="form-group mb-4">

        <label for="inputName" class="col-lg-2 control-label"><h5><b>Name </b></h5></label>
        <div class="col-lg-10">
          <input type="text"  class="form-control p-0 " id="inputName" name="fname" value="<?php echo $row['c_customerName'];?>" required/>
        </div>
      </div>

      <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label"><h5><b>Phone Number </b></h5></label>
        <div class="col-lg-10">
          
        <input type="text"  class="form-control p-0 " id="inputPhone" name="fphone" value="<?php echo $row['c_phoneNo'];?>" required />
            
        </div>
      </div>
       


      <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label"><h4><b><strong>Address Details </strong></b></h4></label>
        <br>
        <label for="inputStreet" class="col-lg-2 control-label"><h5><b>Street </b></h5></label>
        <div class="col-lg-10">
           
      <input type="text"  class="form-control p-0 " id="inputStreet" name="fstreet" value="<?php echo $row['a_street'];?>" required />
    
        </div>
      </div>

      
       <div class="form-group ">
        <label for="inputCity" class="col-lg-2 control-label"><h5><b>City </b></h5></label>
        <div class="col-lg-10">
          <input type="text"  class="form-control p-0 " id="inputCity" name="fcity" value="<?php echo $row['a_city'];?>" required />
        
        </div>

      </div>
       <div class="form-group " >
        <label for="inputPostcode" class="col-lg-2 control-label"><h5><b>Postcode </b></h5></label>
        <div class="col-lg-10">
          <input type="text"  class="form-control p-0 " id="inputPostcode" name="fpostcode" value="<?php echo $row['a_postcode'];?>" required />
         
        </div>

      </div>
       <div class="form-group " >
        <label for="inputState" class="col-lg-2 control-label"><h5><b>State </b></h5></label>

        <div class="col-lg-10">
      
      <?php
          
          $sqla = "SELECT DISTINCT a_state FROM tb_customer
          RIGHT JOIN tb_address ON tb_customer.c_addressID = tb_address.a_addressID
          WHERE a_street='add' AND a_postcode='99999'";
        //WHERE c_custID =$bid


          $resulta = mysqli_query($con,$sqla);

          echo '<select name="fstate" class="form-control" id="inputState">';

          while($rowa= mysqli_fetch_array($resulta))
          {
            if($row['a_state'] == $rowa['a_state']){
              echo "<option value='".$rowa['a_state']."' selected>".$rowa['a_state']." </option>";
            }
            else{
              echo "<option value='".$rowa['a_state']."'>".$rowa['a_state']." </option>";
            }
            
          }
          echo '</select>';

        ?> 
        
         <div class="form-group" style="padding-top: 20px;" >
        <label for="inputStatus" class="col-lg-2 control-label"><h5><b>Status </b></h5></label>
        <div class="col-lg-10">
          <?php
                
            if($row['c_statusID'] == 6){
            echo '<select class="form-control" name="fstatusID" class="form-control" id="inputUserType">';

         {

           echo" <option value='6' selected>ACTIVE</option>";
           echo" <option value='7' >INACTIVE</option>";
          
         
            
                 }
                  echo "</select>";
                    }

            else if($row['c_statusID'] == 7){
            echo '<select class="form-select shadow-none p-0 border-0 form-control-line" name="fstatusID" class="form-control" id="inputUserType">';

         {

           echo" <option value='6' >ACTIVE</option>";
           echo" <option value='7' selected>INACTIVE</option>";
         
            
                 }
                  echo "</select>";
                    }

        ?>

         <input type="text"  class="form-control p-0 border-0" id="inputaddressID" name="faddressID" value="<?php echo $row['a_addressID'];?>" required hidden /> 
         
        </div>
      </div>

         <input type="text"  class="form-control p-0 border-0" id="inputaddressID" name="faddressID" value="<?php echo $row['a_addressID'];?>" required hidden /> 
         
        </div>
      </div>
     
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
           <input type="reset" class="btn btn-warning" value="Reset"/>
         <input type="submit" class="btn btn-primary" name="signup_submit" id="submit" value="Modify" required/><br>

        </div>
      </div>
    </fieldset>
  </form>
</div>
</div>

<?php include 'footer.php'?>