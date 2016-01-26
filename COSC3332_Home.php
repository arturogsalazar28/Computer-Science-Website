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
    <h2 style="text-align: center; font-size: 80px; line-height: 1.3;">COSC 3332 - Computer Architecture & Organization</h2>
    <br />
    <br />
    <h2>Check your current progress in this course:</h2>
    <br />
    <br />
    <div style="text-align: center;">     
      <div id="info"></div>
      <div id="chart4"></div>       
    </div>
  </div>
</main>

  <script src="http://d3js.org/d3.v3.min.js"></script>
  <script type="text/javascript" src="JS/d3-circularheat-master/js/circularHeatChart.js"></script>
  <script type="text/javascript" src="JS/d3-circularheat-master/js/example.js"></script>
  
<?php
include("footer.php");
?>
