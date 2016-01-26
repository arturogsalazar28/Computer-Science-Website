<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'An unknown error occurred. We apologize for the inconvenience.';
}
?>

<?php
include("header.php");
?>

<?php
include("sidebar.php");
?>

<main class="mdl-layout__content">
  <div class="bContent" style="text-align:left;">
   <h1 style="font-size: 80px; text-align: center;">Error!</h1>
   <br />
   <br />
   <h3 class="error"><?php echo $error; ?></h2>

   </div>
 </main>

<?php
include("footer.php");
?>