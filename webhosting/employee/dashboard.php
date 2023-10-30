<?php include 'header.php'; ?> 
<style>
    .dash1{
        color: black;
        background-color: salmon;
    }

    .dash1:hover{
        background-color: indianred;
    }

    .dash2{
        color: black;
        background-color: khaki;
    }

    .dash2:hover{
        background-color: gold;
    }

    .dash3{
        color: black;
        background-color: palegreen;
    }

    .dash3:hover{
        background-color: limegreen;
    }

    .dash4{
        color: black;
        background-color: skyblue;
    }

    .dash4:hover{
        background-color: steelblue;
    }
</style>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Homepage</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->

      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                <div class="row" style="display:flex;">
            
                  <div class="col-lg-3 col-md-12">
                  <a href="checkuser.php">
                    <div class="dash1 white-box analytics-info">
                      <h3 class="box-title">Profile</h3>
                      <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto">
                          <span class="counter text"><i class="fa fa-user fa-2x"></i></span>
                        </li>
                      </ul>
                    </div>
                  </a>
                  </div>
                  
                  <div class="col-lg-3 col-md-12">
                  <a href="customer.php">
                    <div class="dash2 white-box analytics-info">
                      <h3 class="box-title">Customers</h3>
                      <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto">
                          <span class="counter text"><i class="fas fa-address-book fa-2x"></i></span>
                        </li>
                      </ul>
                    </div>
                  </a>
                  </div>

                  <div class="col-lg-3 col-md-12">
                  <a href="service.php">
                    <div class="dash3 white-box analytics-info">
                      <h3 class="box-title">Services</h3>
                      <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto">
                          <span class="counter text"><i class="fas fa-cogs fa-2x" ></i></span>
                        </li>
                      </ul>
                    </div>
                    </a>
                  </div>

                  <div class="col-lg-3 col-md-12">
                  <a href="quotation.php">
                    <div class="dash4 white-box analytics-info">
                      <h3 class="box-title">Quotation</h3>
                      <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li class="ms-auto">
                          <span class="counter text"><i class=" fas fa-file-alt fa-2x"></i></span>
                        </li>
                      </ul>
                    </div>
                    </a>
                  </div>
                  
                </div>


              </div>
            </div>
          
      </div>


<?php include 'footer.php'?>