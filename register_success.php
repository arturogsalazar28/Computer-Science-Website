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
   <h1 style="font-size: 80px; text-align: center;">Registration Successful</h1>
   <br />
   <br />
   <h3>Congratulations on the registration. You may now log in to access your courses.</h2>
   <?php
      if (!empty($error_msg)) {
          echo $error_msg;
      }
      ?>
  </div>
</main>
  
<?php
include("footer.php");
?>
