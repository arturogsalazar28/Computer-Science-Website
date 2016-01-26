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
        <h2 style="text-align: center; font-size: 80px; line-height: 1.3;">Assignment 2</h2>
        <hr>
        <div class="downloadLink">
          <!-- InstanceBeginEditable name="Download" -->
          <h2>Download Assignment</h2>
          <br />
          <a href="Downloads/COSC2410 -Part 3 HW2.pdf" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Download PDF
          </a>
          <!-- InstanceEndEditable -->
        </div>
        <hr />
      <div class="uploadForm">
        <h2>Upload Submission</h2>
        <h5 style="line-height: 1.3;">All files should be in .pdf format and the naming convention for files is <br />
          LastName-FirstName-HW#, ex. Doe-John-HW1.pdf</h5>
        <form enctype="multipart/form-data" method="post" action="">
          <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
          <h5>Choose a file to upload:</h5>
          <input name="uploadedfile" type="file" />
          <br />
          <br />
          <input name="uploadfile" type="submit" value="Upload New File" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"/>
          <a name="returnToPage" href="3332_NumSys_IEEE.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Return to Topic</a> 
        </form> 
      </div>
      <?php
  
      $var = "";
      date_default_timezone_set('America/Chicago');
      
        if (isset($_POST['uploadfile'])){
          
              $target_path = "Uploads/";
    
              $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
              
              if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
              {
                  $var = "File " . basename( $_FILES['uploadedfile']['name']). " uploaded on " . date('m/d/Y h:i:s a');
              }
               
              else
              {
                  $var = "There was an error uploading the file, please try again!";
              }
          
          }
      ?>
      
      <div class="uploadMessage">  <?=$var?>  </div>
    </div>
</main>

<?php
include("footer.php");
?>
