<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>POWEREC </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo1.jpg" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 <style>
     .btn2 {
    margin-top: 14px;
    margin-bottom: 14px;
    margin-left: 200px;
    padding-top: 4px;
    width: 100px;
    height: 30px;
    background: #16a085;
    border: none;
    border-radius: 2px;
    color: #FFF;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    text-transform: uppercase;
    transition: 0.1s ease;
    cursor: pointer;

}

.btn2:hover{
opacity: 0.8;
color: white;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
    
}
 </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">POWEREC</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

    </div>
  </header><!-- End Header -->

<?php

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if(strpos($fullUrl,"alert=successchange")==true){


    
     echo '<div class="col-lg-6">';
           echo '<div class="modal fade show" id="useraddedModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="position: fixed; top: 200px; display: block; padding-right: 16px;" aria-modal="true" role="dialog">';
           echo '<div class="modal-dialog">
                   
              <div class="modal-content">
                  <div class="modal-body text-center"> <i class="far fa-check-circle fa-4x mb-3 animated rotateIn icon1"></i>
                      <strong><p>Password is successfully changed.</p></strong>
                  </div> 

                

                         <a class="btn2" href="signin/signin.php"> <center>OK</center></a>
                  
                  

              </div>
          </div>
        </div>
          
    </div>';
  }
  ?>

    

<script>
var check = function() {
   if (document.getElementById('password').value ==
    document.getElementById('password2').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password Match!';
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password Not Match!';
    document.getElementById("submit").disabled = true;
  }
}

</script>
    

<body>


 <main id="main" style="height:550px;">



<?php
if($_GET['key'] && $_GET['token'])
{
include "dbconnect.php";
$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($con,
"SELECT * FROM `password_reset_temp` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
);
$curDate = date("Y-m-d H:i:s");
if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
if($row['exp_date'] >= $curDate){ ?>

  
 <form class="form-horizontal" method="POST" action="update-forget-password.php" method="post">
     
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">   
    
      <div id="login-box" style="top: 100px; height:350px;">
       
  
         <div class="left" style="width:300px; padding-left: 20px;">
          <h2 style="padding-bottom:20px;">Reset Password</h2>

          <div class= input>
            <input type="password" name="password" id="password" placeholder="New Password" onkeyup="check();" required/>
            
          </div>
          
          <div class= input>
            <input type="password" name="password2" id="password2"placeholder="Re-enter New Password" onkeyup="check();" required />
            <span id="message"></span>
            
          
          </div>
             <input type="submit" id="submit"  value="Reset" required style="width: 220px;"/>
           
         
         
        </div>
      </div>
    </form>
<?php } else{
echo"<br><br><br><br><br><br><br><br><br>
<p><center>This forget password link has been expired</center></p>";
}
}
}
?>
</main>

</body>
 
<footer id="footer">
    <div class="container">
      <h3>POWEREC</h3>
      <p>Updated @2022 </p>
      <div class="social-links">
        <a href="https://www.facebook.com/powerecjb/" class="facebook"><i class="bx bxl-facebook"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
  


