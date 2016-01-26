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
	<div class="bContent" style="text-align:left;">
	<h1 style="font-size: 80px; text-align: center;">Classes on Offer</h1>
	<h4 style="font-size: 24px; font-weight: 300;">CELO has a wide variety of classes to offer. The classes that are available depend upon the semester and if your professor has created a course for your class.
		<br />
		<br />
			CELO currently offers these online courses:</h4>
		<br>
		<br>
		<div class="mdl-grid" style="width: 80%;">
			<div class="mdl-cell mdl-cell--4-col">
				<div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
					<div class="mdl-card__title">
						<h2 class="mdl-card__title-text">COSC XXXX</h2>
					</div>
					<div class="mdl-card__supporting-text">
						<h4>Computer Class</h4>
						<br />
						<br />
					</div>
					<div class="mdl-card__actions mdl-card--border">
						<a href="" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
							Go to Course
						</a>
					</div>
				</div>
			</div>
			<div class="mdl-cell mdl-cell--4-col">
				<div class="mdl-card mdl-shadow--2dp"  style="width: 100%;">
					<div class="mdl-card__title">
						<h2 class="mdl-card__title-text">COSC XXXX</h2>
					</div>
					<div class="mdl-card__supporting-text">
						<h4>Computer Class</h4>
						<br />
						<br />
					</div>
					<div class="mdl-card__actions mdl-card--border">
						<a href="" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
							Go to Course
						</a>
					</div>
				</div>
			</div>   
			<div class="mdl-cell mdl-cell--4-col">
				<div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
					<div class="mdl-card__title">
						<h2 class="mdl-card__title-text">COSC XXXX</h2>
					</div>
					<div class="mdl-card__supporting-text">
						<h4>Computer Class</h4>
						<br />
						<br />
					</div>
					<div class="mdl-card__actions mdl-card--border">
						<a href="" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
							Go to Course
						</a>
					</div>
				</div>
			</div>   
			<div class="mdl-cell mdl-cell--4-col">
				<div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
					<div class="mdl-card__title">
						<h2 class="mdl-card__title-text">COSC XXXX</h2>
					</div>
					<div class="mdl-card__supporting-text">
						<h4>Computer Class</h4>
						<br />
						<br />
					</div>
					<div class="mdl-card__actions mdl-card--border">
						<a href="" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
							Go to Course
						</a>
					</div>
				</div>
			</div>   
			<div class="mdl-cell mdl-cell--4-col">
				<div class="mdl-card mdl-shadow--2dp" style="width: 100%;">
					<div class="mdl-card__title">
						<h2 class="mdl-card__title-text">COSC 2322</h2>
					</div>
					<div class="mdl-card__supporting-text">
						<h4>Computer Class</h4>
						<br />
						<br />
					</div>
					<div class="mdl-card__actions mdl-card--border">
						<a href="" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--accent">
							Go to Course
						</a>
					</div>
				</div>
			</div>           
		</div>

		<h4 style="font-size: 24px; font-weight: 300;">To learn more about each class please click on any class to go to its site. If you are enrolled you can access the site but you must login first to view your personal class information.
			<br />
			<br />
			If you do not see your class or have questions feel free to contact us.
		</h4>
	</div>
</main>


<?php
include("footer.php");
?>