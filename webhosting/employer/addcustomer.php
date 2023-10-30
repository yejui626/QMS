<?php include 'header.php'; 

//GET booking ID
if(isset($_GET['id']))
{
  $uid=$_GET['id'];}

?> 
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <h4 class="page-title"> 
            <a href="customer.php" style="color:black;">Customer</a>
            /
            <a href="addcustomer.php" style="color:black;">Add New Customer</a>
        </h4>
    </div>
</div>


<div class="container-fluid" >
  <div class="white-box">

  <form class="form-horizontal" method="POST" action="addcustomerprocess.php">
    <fieldset>
      <legend>Customer Registration Form</legend>

      <div class="form-group">
        <label for="inputIC" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
          <input type="text" name="fname" class="form-control" id="inputName" placeholder="Please enter your name"required>
          
        </div>
      </div>

 <div class="form-group">

        <label for="inputPhone" class="col-lg-2 control-label">Phone Number</label>
        <div class="col-lg-10">
          <input type="text" name="fphone" class="form-control" id="inputPhone" placeholder="Enter Your Contact Number" required>
        </div>
      </div>
       


      <div class="form-group">
        <h4> Address Details</h4><span class="help-block" style="color:red;">** Please provide detail address</span><br>
        <label for="inputStreet" class="col-lg-2 control-label">Street</label>
        <div class="col-lg-10">
           <input type="text" name="fstreet" class="form-control" id="inputStreet" placeholder="Enter Your street"required>
        </div>
      </div>

      
        <div class="form-group ">
        <label for="inputCity" class="col-lg-2 control-label">City</label>
        <div class="col-lg-10">
         <input type="text" name="fcity" class="form-control" id="inputCity" placeholder="Enter Your city"required>
     
        </div>

      </div>
       <div class="form-group " >
        <label for="inputPostcode" class="col-lg-2 control-label">Postcode</label>
        <div class="col-lg-10">
         <input type="number" name="fpostcode" class="form-control" id="inputPostcode" placeholder="Enter Your postcode"required>
   
        </div>

      </div>

      <div class="form-group " >
        <label for="inputState" class="col-sm-2 control-label">State</label>
        <div class="col-sm-3">
          
          <?php
          
          $sql = "SELECT DISTINCT a_state FROM tb_address WHERE a_street='add' AND a_postcode='99999'";
          $result = mysqli_query($con,$sql);

          echo '<select name="fstate" class="form-control" id="inputState" style="width:120px; margin-bottom:20px;">';

          while($row= mysqli_fetch_array($result))
          {
            echo"<option hidden disabled selected value> -select your state- </option>";
            echo "<option value='".$row['a_state']."'>".$row['a_state']." </option>";
          }
          echo '</select>';

        ?>

     
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn btn-warning">Clear</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>
</div>


<?php include 'footer.php'?>