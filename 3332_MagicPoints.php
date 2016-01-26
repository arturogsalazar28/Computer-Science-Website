<?php
include_once 'PHP/db_connect.php';
include_once 'PHP/functions.php';
 
sec_session_start();
?>

<?php
include("header.php");
?>

<?php
include("sidebar_3332.php");
?>
<!--Body Goes Here-->
<main class="mdl-layout__content">
  <div class="bContent" style="text-align:left;">      
    <h2 style="text-align: center; font-size: 80px; line-height: 1.3;">Magic Points
    <br />
    <h4 style="font-size: 24px; font-weight: 300;">Please select a mystery box to solve. Any correct answer nets you bonus points to be added to your final grade. Good luck!</h4>
    <br />
    <br />
    <div style="text-align:center;">
      <div id="qType">
        <div>T/F</div>
        <br />
        <div>MC</div>
        <br />
        <div>FR</div>
      </div>
      <?php 
      $jarr = getMQArray($mysqli,"numbers"); 
      ?>
      <div id="magicquestions"></div>
      <div id="magicquiz">
      <?php echo gradeMP($mysqli); ?></div>
      </div>
      <br />
  </div>
</main>

<script type="text/javascript" src="JS/magic.js"></script>
<script>	
getMagicPoints(<?php echo $jarr; ?>);
</script>

<?php
include("footer.php");
?>
