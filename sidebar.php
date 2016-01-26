
</head>

<body>

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
    <span class="mdl-layout-title">CELO</span>
    <nav class="mdl-navigation">
      <hr />
      <h4 style="padding-left: 40px;">Navigation</h4>
      <a class="mdl-navigation__link" href="celo_home.php"><i class="mdl-color-text--grey-400 material-icons">home</i><span style="padding-left: 15px; vertical-align:6px;">Home</span></a>
      <a class="mdl-navigation__link" href="celo_classes.php"><i class="mdl-color-text--grey-400 material-icons">chat</i><span style="padding-left: 15px; vertical-align:6px;">Classes</span></a>
      <a class="mdl-navigation__link" href="celo_links.php"><i class="mdl-color-text--grey-400 material-icons">explore</i><span style="padding-left: 15px; vertical-align:6px;">Links</span></a>
      <a class="mdl-navigation__link" href="celo_contact.php"><i class="mdl-color-text--grey-400 material-icons">drafts</i><span style="padding-left: 15px; vertical-align:6px;">Contact</span></a>
      <hr />
      <h4 style="padding-left: 40px;">Account</h4>
      <?php
      if(login_check($mysqli) == true) {
        echo '<a class="mdl-navigation__link" href="courses.php"><i class="mdl-color-text--grey-400 material-icons">book</i><span style="padding-left: 15px; vertical-align:6px;">Your Courses</span></a>
              <a class="mdl-navigation__link" href="PHP/logout.php"><i class="mdl-color-text--grey-400 material-icons">call_received</i><span style="padding-left: 15px; vertical-align:6px;">Log Out</span></a>';}
      else{
      echo '<a class="mdl-navigation__link" href="log_in.php"><i class="mdl-color-text--grey-400 material-icons">call_made</i><span style="padding-left: 15px; vertical-align:6px;">Log In</span></span></a>
            <a class="mdl-navigation__link" href="register.php"><i class="mdl-color-text--grey-400 material-icons">person</i><span style="padding-left: 15px; vertical-align:6px;">Register</span></span></a>';}
      ?>
    </nav>
  </div>
  