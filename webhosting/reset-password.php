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
 
 
 
 <?php include 'signin/header1.php'; ?> 

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
 


 
<?php include 'signin/footer1.php'; ?> 
  


