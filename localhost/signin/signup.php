<?php include 'header1.php'; ?> 

  <main id="main">
  
    <form class="form-horizontal" method="POST" action="signupprocess.php">
    <br><br>
      <div id="login-box">
        <div class="left">
          <h1>Sign up</h1>
          
          <div class= input>
            <input type="text" name="username" placeholder="Username" required />
             <?php 
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl,"usernameexist")==true){
                    echo '<span> Username has been used! </span>';
                }
            ?>
          </div>

          <div class= input>
            <input type="email" name="email" placeholder="E-mail" required/>
            <?php 
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if(strpos($fullUrl,"emailexist")==true){
                    echo '<span> Email has been used! </span>';
                }
            ?>
          </div>

          <div class= input>
           <input type="password" name="password" id="password"placeholder="Password" onkeyup="check();" required/>
          </div>

          <div class= input>
            <input type="password" name="password2" id="password2"placeholder="Retype password" onkeyup="check();" required />
            <span id="message"></span>

          </div>       

          <input type="submit" name="signup_submit" id=submit value="Sign up" required/><br>
          
          <a href = "signin.php" style="font-size:15px;"> Already got an account? </a>
      </div>

    </form>

  </main><!-- End #main -->

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

<?php include 'footer1.php'; ?> 