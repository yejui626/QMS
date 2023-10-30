 <?php include 'header1.php'; ?> 

<style>

.iconback{
  padding-left: 25px;
  color: black; 
  font-size: 28px;
}

.iconback:hover{
  color: grey; 
}

.btn {
  margin-top: 14px;
  margin-bottom: 14px;
  margin-left: 52px;
  width: 120px;
  height: 35px;
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

.btn:hover,
.btn:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
  color: #FFF;
}

.btn:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

</style>


 <main id="main" style="height: 700px;">

<?php 
  $email = "0";
  if(isset($_GET['email'])){
   $email = $_GET['email'];
  }
  
  if($email != "0"){
?>
        <div id="login-box" style="top: 150px; height:280px;">
          <div class="icon" style="font-size: 64px; padding-left: 170px;">        
              <i class="bi bi-envelope-check"></i>      
          </div>
        <div class="left" style="padding-top: 100px;">
          <p class="text-center" style="margin-bottom: 0px;"> A Verification email has been sent to this email address
          </p>
          <p class="text-danger text-center">
            <?php echo $email; ?>
          </p>

          <a class="btn" href="signin.php"> OK </a>
        </div>
<?php 
  } 
  else{
?>

<form class="form-horizontal" method="POST" action="forgetpasswordprocess.php">
    <br><br>
      <div id="login-box" style="top: 100px; height:280px;">
        <a href="signin.php">
          <div class="iconback" style="padding-top:35px;">        
              <i class="bi bi-arrow-left"></i>      
          </div>
        </a>
  
        <div class="left" style="width:400px; padding-left: 40px;">
          <h1 style="padding-bottom:20px;">Reset Password</h1>

          <div class= input>
            <input type="email" name="email" placeholder="E-mail" required />
             <?php 
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl,"emailnotexist")==true){
                    echo '<span> Account not found! </span>';
                }
            ?>
          </div>
         
          <input type="submit" name="signup_submit" id="submit" value="NEXT" required style="width: 220px;"/><br>

        </div>
      </div>
    </form>

<?php } ?>
 

  </main><!-- End #main -->

  <?php include 'footer1.php'; ?> 