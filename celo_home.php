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
		<h1 style="font-size: 80px; text-align: center;">Welcome to CELO</h1>
		<h4 style="font-size: 24px; font-weight: 300;">CELO was designed by Arturo Salazar et. al. for the Department of Computer Science to provide academic support to its students and help them succeed through their college education. CELO offers two main services: online portions for the class and testing.
		<br />
		<br />
			CELO is an online center where a COSC student can locate an online portion of their class to help better prepare them for in class assignments and examinations. It has practice quizzes, graded assignments, graded quizzes, and much more. All of the students class content is evenly organized to help and allow them to efficiently progress every week and see where they are headed.
		<br />
		<br />
			If you are a student and do not have access to your classes online please contact your professor immediately and ask them to register you for their class.
		<br />
		<br />
			We hope you find our services helpful. Our aim has always been to help you succeed in your endeavours.</h4>
		<br />
		<br /> 
	</div>
</main>


<?php
include("footer.php");
?>