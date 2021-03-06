<?php
include_once 'PHP/db_connect.php';
include_once 'PHP/functions.php';
 
sec_session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Topic Information.dwt" codeOutsideHTMLIsLocked="true" -->
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Computer Organization</title>
    <!-- InstanceEndEditable -->
    <link href="CSS/stylesheet.css" rel="stylesheet" type="text/css" /><!--[if lte IE 7]>
    <style>
    .content { margin-right: -1px; } /* this 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
    ul.nav a { zoom: 1; }  /* the zoom property gives IE the hasLayout trigger it needs to correct extra whiltespace between the links */
    </style>
    <![endif]-->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="JS/script.js"></script>

</head>

<body>


<div class="container">
  <div class="header"><a href="home.php"><img src="Resources/Header.png" name="logo" height="165" id="logo" /></a> 
    <!-- end .header --></div>
    
<?php if (login_check($mysqli) == true) : ?>

    <div class="sidebar1">
  
  	<div id="cssmenu">
      <ul class="itemList">
       <li class=''><a href="home.php"><span>Home</span></a></li>
       <li class='has-sub'><a href="number_systems.php"><span>Number Systems</span></a>
          <ul>
             <li><a href="item1.php"><span>Binary, Hex, and Octal</span></a></li>
             <li><a href="item2.php"><span>IEEE and Floating point</span></a></li>
             <li class='last'><a href="item3.php"><span>Combinational Circuits</span></a></li>
          </ul>
       </li>
       <li class='has-sub'><a href="mips.php"><span>MIPS</span></a>
       </li>
       <li class='has-sub'><a href="computer_systems.php"><span>Computer Systems</span></a>
       </li>
       <li class=''><a href="forum.php"><span>Forum</span></a></li>
       <li class=''><a href="extra.php"><span>Extra Activities</span></a></li>
      </ul>
    </div>
    
  </div>
  
  <div class="content">
    <!-- InstanceBeginEditable name="Header" -->
    <h1>Numbers</h1>
	<!-- InstanceEndEditable -->
    
    <div class="downloadLink">
    <!-- InstanceBeginEditable name="Download" -->
    Here you are learning binary, hexadecimal, etc.
	<!-- InstanceEndEditable -->
    </div>
    
    
    
  <!-- end .content --></div>
    <div class="itemPageContent">
    	
    </div>
        
    
<?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="log_in.php">login</a>.
            </p>      
    
<?php endif; ?>


  
  <div class="footer">
  <?php
		if (login_check($mysqli) == true) {
  			echo '<a href="PHP/logout.php">Logout</a>';}
  		else{
			echo '<a href="log_in.php">Log In</a>';}
	?>
		|<a href="courses.php">Courses</a>
    <p>&nbsp;</p>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
