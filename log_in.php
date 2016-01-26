<?php
include_once 'PHP/db_connect.php';
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
            <h2 class="mdl-card__title-text-login" style="color:white;">Login</h2>
          </div>
          <div class="mdl-card__supporting-text">
            <div class="login" >
              <?php
              if (isset($_GET['error'])) {
                echo '<h5 class="error" style="color: red; font-size: 18px;">Error: Wrong Credentials.</p
                <br />
                <br />';
              }
              ?> 
              <?php
              if (login_check($mysqli) == true) {
                echo '<h5>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</h5>';
                
                echo '<h5>Do you want to change user?</h5>
                <br />
                <br />
                <button href="PHP/logout.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Log out</button>';
              } 
              else {
                echo '<form action="PHP/process_login.php" method="post" name="login_form">
                <input class="form-control" type="text" name="email" id="email" placeholder="Email"/>
                <br />
                <input class="form-control" type="password" name="password" id="password" placeholder="Password"/>
                <br />
                <br />
                <input type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" value="Login" onclick="formhash(this.form, this.form.password);" />
              </form>';
            }
            ?>
          </div>             
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