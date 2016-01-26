<?php
include_once 'PHP/db_connect.php';
include_once 'PHP/functions.php';
 
sec_session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/PractizeQuiz Grade.dwt" codeOutsideHTMLIsLocked="true" -->
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Computer Organization</title>
    <!-- InstanceEndEditable -->
    <link href="CSS/stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="CSS/material.css" rel="stylesheet" type="text/css" /><!--[if lte IE 7]>
    <style>
    .content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
    ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
    </style>
    <![endif]-->
    <script src="JS/material.js"></script>
    <script src="JS/material-style.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="JS/script.js"></script>

</head>

<body>
 <?php if (login_check($mysqli) == true) : ?>
<div class="mdl-layout mdl-js-layout 
            mdl-layout--overlay-drawer-button">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title"><img src="Resources/uh-logo.png" width="60px;"></img></span>
      <div class="mdl-layout-spacer"></div>
      <span style="font-size: 20px;">COMPUTER ORGANIZATION</span>
    </div>
  </header>
  <main class="mdl-layout__content">
      <div class="bContent" style="text-align:left;">
        <!-- InstanceBeginEditable name="Header" -->
        <h2 style="text-align: center; font-size: 80px; line-height: 1.3;">*Insert Practice Quiz Name*</h2>
        <hr />
        <!-- InstanceEndEditable -->
        <h2>Here are your results:</h2>
        <br />
         <?php
    
        $rightAnswers = unserialize($_POST['rAnswers']);
        $grade = 0;
        for($x=1; $x<=10; $x++){
            
            if(isset($_POST["q". $x ])){
                
                if($rightAnswers[$x] == $_POST["q". $x ]){
                    
                    
                    echo  "<h5>" . $x . ") Your Answer: " . $_POST["q". $x ] . "<BR>    Correct!</h5>";
                    $grade += 10;
                }
                else{
                    
                    echo  "<h5>" . $x . ") Your Answer: " . $_POST["q". $x ] . "<BR>    Incorrect, the correct answer is: " . $rightAnswers[$x] . "</h5>";
                }
            }
            else{
                echo "<h5>" . $x . ") You did not answer this question.</h5>";
            }
        }
        
        echo "<BR> <h2>Your grade: " . $grade . "%</h2>";
    
        saveGrade($mysqli, $grade, "s1i1pq1");
    
        ?>
        <hr />
        <a name="returnToPage" href="home.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Return to Course Home</a> 
      </div>
  </main>
</div>   
   
<?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="log_in.php">login</a>.
            </p>   
    
<?php endif; ?>


</body>
</html>
