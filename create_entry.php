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
  <!-- InstanceBeginEditable name="Body Content" -->
        <h2 style="text-align: center; font-size: 80px; line-height: 1.3;">Create Topic</h2>
        <br />
        <form action="PHP/new_post.php" method="post" name="login_form">
        
        <h3>Title:</h3>
        <input name="postTitle" type="text" size="50" />
        <br />
        <br />
        <h3>Body:</h3>
        <textarea name="postText" cols="55" rows="5"></textarea>
        
        <input type="submit" value="Submit" />
        
        </form>
        <!-- InstanceEndEditable -->
      </div>
</main>
  
<?php
include("footer.php");
?>
