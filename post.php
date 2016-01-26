<?php
include_once 'PHP/db_connect.php';
include_once 'PHP/functions.php';
 
sec_session_start();
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
  <!-- InstanceBeginEditable name="Body Content" -->
        <?php
	  	if(isset($_GET['postID'])){
			
			$postID = $_GET['postID'];
			
			$post = getPost($mysqli,$postID);
			
			if($post!=''){
			
				echo "<h2>" . $post['title'] . "</h2>
					<h5>" . $post['question'] . "</h5>
					Posted by: ". $post['author'] . "<br />";
					
				$replies = getReplies($mysqli, $postID);
				
				if($replies == 0){
					echo "<h5>There are no replies, be the first!</h5>";
				}
				
				else{
					
					echo "<div class='post'>
							<table style='width: 80%; margin-left: 10px;'>";
					
					for($i=0; $i<(count($replies)); $i++){
					  echo "<tr>
					  			<h5>" .$replies[$i]['author'] . "</h5>" . 
							  		$replies[$i]['title'] . "<br />" .
							 	 	$replies[$i]['reply'] .
					  		"</tr>";
					}
					
					echo "</table>
						</div>";
				}
			}
			
			echo "<form action='PHP/new_reply.php?postID=" . $postID . "' method='post' name='reply_form'>
        
					  <h3>Title:</h3>
					  <input name='replyTitle' type='text' size='50' />
					  <br />
					  <br />
					  <h3>Body:</h3>
					  <textarea name='replyText' cols='55' rows='5'></textarea>
					  
					  <input type='submit' value='Submit' />
					  
					  </form>";
			
			
		}
	  ?>
        <!-- InstanceEndEditable -->
    </div>
</main>

<?php
include("footer.php");
?>