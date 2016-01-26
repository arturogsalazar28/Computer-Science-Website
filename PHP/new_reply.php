<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.

$post = $_GET['postID'];

if(isset($_POST['replyTitle'], $_POST['replyText'])){
	
	$userName = $_SESSION['username'];
	$title = $_POST['replyTitle'];
	$text = $_POST['replyText'];
		
		
			if ($stmt = $mysqli->prepare("INSERT INTO `replies`(`title`, `author`, `date`, `reply`, `postID`) VALUES (?,?,CURDATE(),?,?)")) {
				// Bind "$user_id" to parameter. 
				$stmt->bind_param('ssss', $title, $userName, $text, $post);
				$stmt->execute();   // Execute the prepared query.
				
				updateReplies($mysqli, $post);
				
				header('Location: ../post.php?postID='.$post);
			}	
		
			else{
				
				header('Location: ../post.php?postID='.$post . '&error=1');
				
			}
}


else{
	
	header('Location: ../post.php?postID='.$post. '&error=1');
	
}


?>