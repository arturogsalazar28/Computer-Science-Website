<?php
include_once 'PHP/register.inc.php';
include_once 'PHP/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>


<?php
include("header.php");
?>

<?php
include("sidebar.php");
?>

<!--Body Goes Here-->
<main class="mdl-layout__content">
  <div class="bContent" style="text-align:left;">
    <div class="mdl-grid">
        <div class="mdl-cell--4-col"></div>
        <div class="mdl-cell--4-col">
            <div class="mdl-card mdl-card-login mdl-shadow--2dp" style="width: 100%;">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text-login" style="color:white;">Register</h2>
                </div>
                <div class="mdl-card__supporting-text">
                  <?php
                  if (!empty($error_msg)) {
                      echo $error_msg;
                  }
                  ?>
                  <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">
                      <input type='text' name='firstName' id='firstName' placeholder ='First Name'/><br>
                      <br />
                      <input type='text' name='lastName' id='lastName' placeholder ='Last Name'/><br>
                      <br />
                      <input type='text' name='userID' id='userID' placeholder ='UH ID'/><br>
                      <br />
                      <br />
                      <input type='text' name='username' id='username' placeholder ='Username'/><br>
                      <br />
                      <input type="text" name="email" id="email" placeholder ='E-mail'/><br>
                      <br />
                      <input type="password" name="password" id="password" placeholder ='Password'/><br>
                      <br />
                      <input type="password" name="confirmpwd" id="confirmpwd" placeholder ='Confirm Password'/><br>
                      <br />
                      <input type="button" value="Register" onclick="return regformhash(this.form,this.form.username,this.form.email,
                 			this.form.password,this.form.confirmpwd);" /> 
     		 		</form> 
                </div>
            </div>
        </div>
        <div class="mdl-cell--4-col"></div>
    </div>
  </div>
</main>
  
<?php
include("footer.php");
?>