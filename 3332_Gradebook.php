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
<main class="mdl-layout__content" style="padding: 10px 20px;">
<h2> Gradebook </h2>
    <?php
    getGrades($mysqli, 'cosc3332_sgrades', strpos(htmlentities($_SESSION['username']) ,'Admin'));
    ?>
</main>


<script src="http://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript" src="JS/d3-circularheat-master/js/circularHeatChart.js"></script>
<script type="text/javascript" src="JS/d3-circularheat-master/js/example.js"></script>
  
<?php
include("footer.php");
?>
