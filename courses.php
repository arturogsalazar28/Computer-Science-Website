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

<!--Body Goes Here-->
<main class="mdl-layout__content">
	<div class="bContent" style="text-align:left;">
		<?php
		if (isset($_GET['error'])) {
			echo '<h4 class="error">Error: Unable to retrieve courses due to an error.</h4>';
		}
		?> 
		
		<!--Note: The title and link should be dynamically created, enclosed within the title text headers (example here is COSC 3332)-->
		<?php
		if (login_check($mysqli) == true) {
			echo '<div style="text-align:right; margin:16px 8px 0 0;">Logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</div>';
			
			$classArray = getClasses($mysqli);
			echo '<h2>Currently Enrolled In:</h2><div style="margin: 24px 80px;">
			<div class="mdl-grid">';
				if($classArray!=0){
					if($classArray['cosc3332']==true){
						echo '<div class="mdl-cell mdl-cell--4-col">
						<div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
							<div class="mdl-card__title">
								<h2 class="mdl-card__title-text">COSC 3332</h2>
							</div>
							<div class="mdl-card__supporting-text">
								<h4>Computer Organization & Architecture</h4>
								<br />
								<br />
							</div>
							<div class="mdl-card__actions mdl-card--border">
								<a href="COSC3332_Home.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
									Go to Course
								</a>
							</div>
						</div>
					</div>';
				}
				
				if($classArray['otherclass']==true){
					echo '<div class="mdl-cell mdl-cell--4-col">
					<div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
						<div class="mdl-card__title">
							<h2 class="mdl-card__title-text">COSC XXXX</h2>
						</div>
						<div class="mdl-card__supporting-text">
							<h4>Some Other CS Course</h4>
							<br />
							<br />
						</div>
						<div class="mdl-card__actions mdl-card--border">
							<a href="home.php" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
								Go to Course
							</a>
						</div>
					</div>
				</div>';
			}
		}
		if($classArray==0){
			echo '<h3>You are not enrolled in any classes. If you have a class which uses C.E.L.O., please contact your professor.</h3>';}
			
			if (strpos(htmlentities($_SESSION['username']),'Admin') !== false) {
				echo '</div>
				<hr />
				<a href="">Click here to manage courses</a>';
				echo '<br /> 
				<a href ="register.php">Click here to register students for your courses</a>';
			}
			
			echo '</div>';
			
		} else {
			echo '<p>Currently logged ' . $logged . '.</p>
			<p> Please log in to view your classes </p>';
		}
		?>
	</div>                
</main>

<?php
include("footer.php");
?>
