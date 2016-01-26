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
    <?php if (login_check($mysqli) == true) : ?>    
      <h2 style="text-align: center; font-size: 80px; line-height: 1.3;">Binary, Hex, and Octal</h2>
      <hr />
      <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col">
          <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
            <div class="mdl-card__title">
              <!-- InstanceBeginEditable name="assignName" -->
              <h2 class="mdl-card__title-text">Assignment 1</h2>
              <!-- InstanceEndEditable -->
            </div>
            <div class="mdl-card__supporting-text">
              <!-- InstanceBeginEditable name="assignDDate" -->
              <h5>Due Date: 05/29/15</h5>
              <!-- InstanceEndEditable -->
              <!-- InstanceBeginEditable name="assignUploaded" -->
              <h5>Uploaded: No</h5>
              <!-- InstanceEndEditable -->
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="3332_01_01_HW.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                Go to Page
              </a>
            </div>
          </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col">
          <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
            <div class="mdl-card__title">
              <!-- InstanceBeginEditable name="pQuizName" -->
              <h2 class="mdl-card__title-text">Practice Quiz 1</h2>
              <!-- InstanceEndEditable -->
            </div>
            <div class="mdl-card__supporting-text">
              <!-- InstanceBeginEditable name="pQuizDDate" -->
              <h5>Due Date: 05/31/15</h5>
              <!-- InstanceEndEditable -->
              <!-- InstanceBeginEditable name="pQuizCompletion" -->
              <h5>Completed: No</h5>
              <!-- InstanceEndEditable -->
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="3332_01_01_QIntro.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                Go to Page
              </a>
            </div>
          </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col">
          <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
            <div class="mdl-card__title">
              <!-- InstanceBeginEditable name="quizName" -->
              <h2 class="mdl-card__title-text">Quiz 1</h2>
              <!-- InstanceEndEditable -->
            </div>
            <div class="mdl-card__supporting-text">
              <!-- InstanceBeginEditable name="quizDDate" -->
              <h5>Due Date: 05/31/15</h5>
              <!-- InstanceEndEditable -->
              <!-- InstanceBeginEditable name="quizCompletion" -->
              <h5>Completed: No</h5>
              <!-- InstanceEndEditable -->
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                Go to Page
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>


  <?php else : ?>
    <p>
      <span class="error">You are not authorized to access this page.</span> Please <a href="log_in.php">login</a>.
    </p>    
  <?php endif; ?>
</main>

<?php
include("footer.php");
?>
