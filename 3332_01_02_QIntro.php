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
      <!-- InstanceBeginEditable name="Header" -->
      <h2 style="text-align: center; font-size: 80px; line-height: 1.3;">Practice Quiz 2</h2>
      <!-- InstanceEndEditable -->
      <hr />
      <h4>This is an online practice quiz designed to help you see your progress 
      in this section. The quiz is not timed or graded; however, you should 
      still try your best every attempt.</h4>
      <br />
      <form method="post" action="">
        <h4>You may now begin the practice quiz.</h4> 
        <br />
        <input name="startPQuiz" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" value="Start Practice Quiz" />
        <a name="returnToPage" href="item2.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Return to Topic</a> 
      </form>

      <?php
  
      $attempts = 5;
      
        if (isset($_POST['startPQuiz'])){
          
            $host  = $_SERVER['HTTP_HOST'];
              $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
              $quizNumber = substr($_SERVER['PHP_SELF'], -5, 1);
              $extra = 'pquiz' . $quizNumber . 'q.php';
              header("Location: http://$host$uri/$extra");
              exit;
          
          }
      
      $attemptsLeft = "Attempts left: " . $attempts;    
         
      ?>
    </div>
</main>

<?php
include("footer.php");
?>