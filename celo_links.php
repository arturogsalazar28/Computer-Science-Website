<?php
include_once 'PHP/db_connect.php';
include_once 'PHP/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<?php
include("header.php");
?>

<?php
include("sidebar.php");
?>

//Body Goes Here  
<main class="mdl-layout__content">
  <div class="page-content">

    <div class="bContent" style="text-align:left;">
      <h1 style="font-size: 80px; text-align: center;">Links</h1>
      <h4 style="font-size: 24px; font-weight: 300;">Here are some helpful links provided to you to help you succeed:</h4>

      <div class="mdl-grid" style="width: 80%;">
        <div class="mdl-cell mdl-cell--4-col">
          <div class="mdl-card mdl-shadow--2dp" style="width: 100%">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">COSC Homepage</h2>
            </div>
            <div class="mdl-card__supporting-text">
              <h5>The hub for all things computer science.</h5>
              <br />
              <br />
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="http://www.cs.uh.edu/" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                Go to Page
              </a>
            </div>
          </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col">
          <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">COSC Catalog</h2>
            </div>
            <div class="mdl-card__supporting-text">
              <h5>Course catalog for the CS major.</h5>
              <br />
              <br />
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="http://catalog.uh.edu/preview_program.php?catoid=6&poid=1582&returnto=1129" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                Go to Page
              </a>
            </div>
          </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col">
          <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">COSC Flowchart</h2>
            </div>
            <div class="mdl-card__supporting-text">
              <h5>Determine the CS course roadmap.</h5>
              <br />
              <br />
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="http://www.cs.uh.edu/docs/cosc/COSC%20Flowchart.pdf" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                Go to Page
              </a>
            </div>
          </div>
        </div> 
        <div class="mdl-cell mdl-cell--4-col">
          <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">Cougar CS</h2>
            </div>
            <div class="mdl-card__supporting-text">
              <h5>Learn and access the benefits of joining Cougar CS.</h5>
              <br />
              <br />
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="http://cougarcs.com/" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                Go to Page
              </a>
            </div>
          </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col">
          <div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">Advising</h2>
            </div>
            <div class="mdl-card__supporting-text">
              <h5>Get academic advising and support for CS majors.</h5>
              <br />
              <br />
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="http://www.cs.uh.edu/undergraduate/advising/index.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
                Go to Page
              </a>
            </div>
          </div>
        </div>            
      </div>


      <h4 style="font-size: 24px; font-weight: 300;">If any of the links are not working or you have other helpful links feel free to contact us.</h4>
    </div>
  </div>
</main>


<?php
include("footer.php");
?>
