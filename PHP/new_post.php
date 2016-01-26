<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.


if(isset($_POST['postTitle'], $_POST['postText'])){
	
	$userName = $_SESSION['username'];
	$title = $_POST['postTitle'];
	$text = $_POST['postText'];
		
		
			if ($stmt = $mysqli->prepare("INSERT INTO `forum_posts`(`title`, `author`, `date`, `question`) VALUES (?,?,CURDATE(),?)")) {
				// Bind "$user_id" to parameter. 
				$stmt->bind_param('sss', $title, $userName, $text);
				$stmt->execute();   // Execute the prepared query.
				
				
				header('Location: ../forum.php');
			}	
		
			else{
				
				header('Location: ../create_post.php?error=1');
				
			}
}


else{
	
	header('Location: ../create_post.php?error=1');
	
}


?>