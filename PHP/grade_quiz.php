<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.

?>

Here are your results.<BR>


<?php

	$rightAnswers = unserialize($_POST['rAnswers']);
	$grade = 0;
	for($x=1; $x<=10; $x++){
		
		if(isset($_POST["q". $x ])){
			
			if($rightAnswers[$x] == $_POST["q". $x ]){
				
				
				echo  "Your Answer: " . $_POST["q". $x ] . "<BR>Correct!<BR><BR>";
				$grade += 10;
			}
			else{
				
				echo "Your Answer: " . $_POST["q". $x ] . "<BR>Incorrect, the correct answer is: " . $rightAnswers[$x] . "<BR><BR>";
			}
		}
		else{
			echo "You did not answer this question.<BR><BR>";
		}
	}
	
	echo "<BR> Your grade: %" . $grade;

	saveGrade($mysqli, $grade, "s1i1pq1");

?>