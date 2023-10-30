<?php include 'header.php'; 

//GET booking ID
if(isset($_GET['id']))
{
  $uid=$_GET['id'];}


?> 
  <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add New Customer</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <div class="container">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
      <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
        <li class="breadcrumb-item">
          <a href="#" role="button">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
            <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path>
          </svg>
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="customer.php" role="button">CUSTOMER</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">ADD CUSTOMER</li>
      </ol>
    </nav>
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
          <input type="text" name="fphone" class="form-control" id="inputPhone" placeholder="Enter Your Contact Number"required>
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
        <label for="inputState" class="col-lg-2 control-label">State</label>
        <div class="col-lg-10">
          
          <?php
          $sql = "SELECT DISTINCT a_state FROM tb_address WHERE a_street='add' AND a_postcode='99999'";
          $result = mysqli_query($con,$sql);

          echo '<select name="fstate" class="form-control" id="inputState">';

          while($row= mysqli_fetch_array($result))
          {
            echo "<option value='".$row['a_state']."'>".$row['a_state']." </option>";
          }
          echo '</select>';

        ?> 

     
        </div>
      </div>

     
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