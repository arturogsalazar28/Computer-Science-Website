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
    <h1 style="font-size: 80px; text-align: center;">Contact Us</h1>
    <h4 style="font-size: 24px; font-weight: 300;">You have many ways to contact CELO with any questions, concerns, problems, or suggestions below is the contact information.
      <br />
      <br />
      <br />
      <strong>C.E.L.O.</strong>
      <br />
      4800 Calhoun Rd, Houston, TX 77004
      <br />
      713-743-2255
      <br />
      email@domain.com
      <br />
      <br />
      <br />
      Any issue you have we wil promptly fix them and help you any way needed.
    </h4>
  </div>
</main>

<?php
include("footer.php");
?>