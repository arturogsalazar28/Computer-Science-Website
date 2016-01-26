</head>


<!--Add proper check so this sidebar corresponds to any course the student has access to instead of hard-coding these per course-->
<body>
<?php if (login_check($mysqli) == true) : ?> 
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--overlay-drawer-button">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title"><img src="Resources/uh-logo.png" width="60px;"></img></span>
      <div class="mdl-layout-spacer"></div>
      <span style="font-size: 20px;">COMPUTER ORGANIZATION</span>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title" style="font-size:28px; font-weight:200;">COSC 3332</span>
    <nav class="mdl-navigation">
      <hr />

      <!--Items in the sidebar must be dynamically created (via array, etc.) corresponding to the course topics and subtopics-->

      <h4 style="padding-left: 40px;">Course Topics</h4>
      <a id="num_sys" class="mdl-navigation__link"><i class="mdl-color-text--grey-400 material-icons">format_list_numbered</i><span style="padding-left: 15px; vertical-align:6px; cursor: pointer">Number Systems</span></a>
      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="num_sys">
        <a class="mdl-menu__item" href="3332_01_01.php" style="text-decoration:none;" name="BHO">Binary, Hex, and Octal</a>
        <a class="mdl-menu__item" href="3332_01_02.php" style="text-decoration:none;" name="IEEE">IEEE Floating Point</a>
        <a class="mdl-menu__item" href="3332_01_03.php" style="text-decoration:none;" name="Com_circuit">Combinational Circuits</a>
      </ul>
      <a  id="MIPS" class="mdl-navigation__link"><i class="mdl-color-text--grey-400 material-icons">code</i><span style="padding-left: 15px; vertical-align:6px; cursor: pointer">MIPS</span></a>
      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="MIPS">
        <a class="mdl-menu__item" href="" style="text-decoration:none;" name="item1">Item 1</a>
        <a class="mdl-menu__item" href="" style="text-decoration:none;" name="item2">Item 2</a>
        <a class="mdl-menu__item" href="" style="text-decoration:none;" name="item3">Item 3</a>
      </ul>
      <a id="com_sys" class="mdl-navigation__link"><i class="mdl-color-text--grey-400 material-icons">computer</i><span style="padding-left: 15px; vertical-align:6px; cursor: pointer">Computer Systems</span></a>
      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="com_sys">
        <a class="mdl-menu__item" href="" style="text-decoration:none;" name="item1">Item 1</a>
        <a class="mdl-menu__item" href="" style="text-decoration:none;" name="item2">Item 2</a>
        <a class="mdl-menu__item" href="" style="text-decoration:none;" name="item3">Item 3</a>
      </ul>
      <hr />
      <h4 style="padding-left: 40px;">Course Links</h4>
      <a class="mdl-navigation__link" href="forum.php"><i class="mdl-color-text--grey-400 material-icons">forum</i><span style="padding-left: 15px; vertical-align:6px;">Forum</span></a>
      <a id="extra" class="mdl-navigation__link"><i class="mdl-color-text--grey-400 material-icons">mode_edit</i><span style="padding-left: 15px; vertical-align:6px; cursor: pointer">Extra Activities</span></a>
      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="extra">
        <a class="mdl-menu__item" href="3332_MagicPoints.php" style="text-decoration:none;" name="Magic_points">Magic Points</a>
      </ul>
      <hr />
      <h4 style="padding-left: 40px;">Account</h4>
      <?php
      if (login_check($mysqli) == true) {
        echo '<a class="mdl-navigation__link" href="courses.php"><i class="mdl-color-text--grey-400 material-icons">book</i><span style="padding-left: 15px; vertical-align:6px;">Your Courses</span></a>
              <a class="mdl-navigation__link" href="PHP/logout.php"><i class="mdl-color-text--grey-400 material-icons">call_received</i><span style="padding-left: 15px; vertical-align:6px;">Log Out</span></a>';}
      else{
      echo '<a class="mdl-navigation__link" href="PHP/log_in.php"><i class="mdl-color-text--grey-400 material-icons">call_made</i><span style="padding-left: 15px; vertical-align:6px;">Log In</span></span></a>';}
      if(strpos(htmlentities($_SESSION['username']) ,'Admin') !== false){
	echo '<a class="mdl-navigation__link" href="3332_Gradebook.php"><i class="mdl-color-text--grey-400 material-icons">book</i><span style="padding-left: 15px; vertical-align:6px;">Gradebook</span></a>';}
	?>

  <?php else : ?>
  <h2 style="font-size: 40px; font-weight: 600;">
    <span class="error">You are not authorized to access this page.</span> Please <a href="log_in.php">login</a>.
  </h2>    
  <?php endif; ?>
    </nav>
  </div>