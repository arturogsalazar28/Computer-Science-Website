<?php
include_once 'PHP/db_connect.php';
include_once 'PHP/functions.php';
 
sec_session_start();
?>

<?php
include("header.php");
?>

<?php
include("sidebar_3332.php");
?>

<!--Body Goes Here-->
<main class="mdl-layout__content">
    <div class="bContent" style="text-align:left;">
  <!-- InstanceBeginEditable name="Body Content" -->
        <div class="forum">
           <table style="width:80%">
            <tr>
              <th>Post</th>
              <th>Replies</th>
            </tr>
            <?php
		  	
		  	$entries = getEntriesArray($mysqli);
			
			if($entries != 0){
				for($i=0; $i<(count($entries)); $i++){
				  echo "<tr>
							<td><a href='post.php?postID=". $entries[$i]['id'] ."'>" . $entries[$i]['title'] ."</a><br /> Date Posted: " . $entries[$i]['date'] ." By:" . $entries[$i]['author'] ."</td>
							<td>" . $entries[$i]['replies'] ."</td>	
						</tr>";
				}
			}
			else{
				echo"<h2>There are no forum posts, be the first!</h2>";}
		  ?>
          </table>
          <a class="item" href="create_entry.php" style=""> + Create a new entry</a> 
        </div>
        <!-- InstanceEndEditable -->
      </div>
</main>

<?php
include("footer.php");
?>