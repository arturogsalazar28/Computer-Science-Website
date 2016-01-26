<?php
include_once 'psl-config.php';
 
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}

function login($email, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT id, username, password, salt 
        FROM members
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
 
        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}


function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}


function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

//Returns array of classes
function getClasses($mysqli)
{
	if(isset($_SESSION['user_id'])){

	$user_id = $_SESSION['user_id'];
	
		if ($stmt = $mysqli->prepare("SELECT * 
                                      FROM enrollement 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $res = $stmt->get_result();
			if ($res->num_rows > 0) {
    			while ($row = $res->fetch_assoc()) {
        			$results = $row;
    			}
    		return $results;}
			else{
			return "0";}
		}
									  
	}
} 

//Returns array of of question info
function getQuestion($mysqli, $id, $topic)
{
	$type = 1; //set default using different method to get question set
	switch($type){
		case 1: $type = "mc";
		break;
		case 2: $type = "tf";
		break;
		case 3: $type = "fr";
		break;
	}
	
	if ($stmt = $mysqli->prepare("SELECT * 
                                      FROM questionbank 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$id" to parameter. 
            $stmt->bind_param('i', $id);
            $stmt->execute();   // Execute the prepared query.
            $res = $stmt->get_result();
			if ($res->num_rows > 0) {
    			while ($row = $res->fetch_assoc()) {
        			$results = $row;
    			}
				
    		return $results;}
			else{
			return "0";}
		}
	
}

function mixAnswers($questionArray, $answers){

			$numbers = range(1,$answers);
			shuffle($numbers);	
			
			
			for($x = 0; $x < $answers; $x++){
								
				Switch($numbers[$x]){
					case 1: $arrayIdentifier = 'rightAnswer';
						break;
					case 2: $arrayIdentifier = 'wAnswer1';
						break;
					case 3: $arrayIdentifier = 'wAnswer2';
						break;
					case 4: $arrayIdentifier = 'wAnswer3';
						break;}
				
				$mixedArray[$x] = $questionArray[$arrayIdentifier];}
			
			return $mixedArray;	
}

function saveGrade($mysqli, $grade, $assignment){
	
	if(isset($_SESSION['user_id'])){

		$user_id = $_SESSION['user_id'];
		
		$exists = $mysqli->query("SELECT EXISTS(SELECT 1 FROM cosc3332_sgrades WHERE id =" . $user_id . ")");
		
		if(!$exists){
			if ($stmt = $mysqli->prepare("INSERT INTO cosc3332_sgrades(id, " . $assignment . ") VALUES (?,?)")) {
				// Bind "$user_id" to parameter. 
				$stmt->bind_param('ii', $user_id, $grade);
				$stmt->execute();   // Execute the prepared query.
			}
		}
		else{
			if ($stmt = $mysqli->prepare("UPDATE cosc3332_sgrades SET " . $assignment . "  = ? WHERE id = ? ;")) {
				// Bind "$user_id" to parameter. 
				$stmt->bind_param('ii', $grade, $user_id);
				$stmt->execute();   // Execute the prepared query.
			}	
		}
	}
}

function getEntriesArray($mysqli){
	
	if ($stmt = $mysqli->prepare("SELECT * FROM forum_posts")) {
            $stmt->execute();   // Execute the prepared query.
            $res = $stmt->get_result();
			if ($res->num_rows > 0) {
    			while ($row = $res->fetch_assoc()) {
        			$results[] = $row;
    			}
				
    			return $results;}
			else{
				
				return "0";}
		}

}


function getPost($mysqli, $id){
	
	if ($stmt = $mysqli->prepare("SELECT * 
                                      FROM forum_posts 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$id" to parameter. 
            $stmt->bind_param('i', $id);
            $stmt->execute();   // Execute the prepared query.
            $res = $stmt->get_result();
			if ($res->num_rows > 0) {
    			while ($row = $res->fetch_assoc()) {
        			$results = $row;
    			}
				
    		return $results;}
			else{
			return "0";}
		}
		
}

function getReplies($mysqli, $id){
	
	if ($stmt = $mysqli->prepare("SELECT * 
                                      FROM replies 
                                      WHERE postID = ?")) {
            // Bind "$id" to parameter. 
            $stmt->bind_param('i', $id);
            $stmt->execute();   // Execute the prepared query.
            $res = $stmt->get_result();
			if ($res->num_rows > 0) {
    			while ($row = $res->fetch_assoc()) {
        			$results[] = $row;
    			}
				
    		return $results;}
			else{
			return "0";}
		}
}


function updateReplies($mysqli, $post){

	$replies = count(getReplies($mysqli, $post));

	if ($stmt = $mysqli->prepare("UPDATE `forum_posts` SET `replies`=? WHERE `id`=?")) {
            // Bind "$id" to parameter. 
            $stmt->bind_param('ii', $replies, $post);
            $stmt->execute();   // Execute the prepared query.			
		}
}

function getGrades($mysqli, $class, $admin){
	
	if($admin !== false){if ($stmt = $mysqli->prepare("SELECT * 
										FROM ".$class)){
            $stmt->execute();   // Execute the prepared query.
            $res = $stmt->get_result();
			if ($res->num_rows > 0) {
    			while ($row = $res->fetch_assoc()) {
        			$results[] = $row;
    			}}}
	else {if ($stmt = $mysqli->prepare("SELECT * 
                                      FROM ".$class." WHERE id = ? LIMIT 1")){
			$stmt->bind_param('s');
            $stmt->execute();   // Execute the prepared query.
            $res = $stmt->get_result();
			if ($res->num_rows > 0) {
    			while ($row = $res->fetch_assoc()) {
        			$results[] = $row;
    			}}}
										  	
						echo "<div class='post'><table style='width: 80%; margin-left: 10px;'>";
						echo "<tr>
								<th>Student ID</th>
							  	<th> S1 I1 PQ1</th>
							  	<th> S1 I1 PQ1</th>
							  </tr>";
							  
						for($i=0; $i<(count($results)); $i++){
						  echo "<tr>
						  		<td>"  .	$results[$i]['id'] . "</td>" .
								"<td>" .	$results[$i]['s1i1pq1'] . "</td>" .
								"<td>" .	$results[$i]['s1i1q1'] . "</td>
						  		</tr>";
						}
						
						echo "</table></div>";}
			
		}
}

function getMQArray($mysqli, $topic)
{
	$types = array("tf","mc","fr");
	
	if ($stmt = $mysqli->prepare("SELECT * FROM `questionbank` WHERE qType = ? AND topic = ? ORDER BY rand() LIMIT 3")) {
            // Bind "$id" to parameter. 
			for($i=0; $i<count($types); $i++){
				$type = $types[$i];
				$stmt->bind_param('ss', $type, $topic);
				$stmt->execute();   // Execute the prepared query.
				$res = $stmt->get_result();
				if ($res->num_rows > 0) {
					while ($row = $res->fetch_assoc()) {
						$results[] = $row;
					}
				}
			}
			
			$jsonArray = array();
			
			for($x = 0; $x < count($results); $x++) {
				if($x>-1 && $x<=2){
				array_push( $jsonArray, array( 
							"id" => $results[$x]["id"],
							"q" => $results[$x]["question"],
							"a1" => $results[$x]["rightAnswer"],
							"a2" => $results[$x]["wAnswer1"],
							"a3" => null,
							"a4" => null
							));
				}
				else if($x>2 && $x<=5){
				array_push( $jsonArray, array( 
							"id" => $results[$x]["id"],
							"q" => $results[$x]["question"],
							"a1" => $results[$x]["rightAnswer"],
							"a2" => $results[$x]["wAnswer1"],
							"a3" => $results[$x]["wAnswer2"],
							"a4" => $results[$x]["wAnswer3"]
							));
				}
				else if($x>5 && $x<=8){
				array_push( $jsonArray, array( 
							"id" => $results[$x]["id"],
							"q" => $results[$x]["question"],
							"a1" => null,
							"a2" => null,
							"a3" => null,
							"a4" => null
							));
				}
			}
				
    		return json_encode($jsonArray);
		}
			else{
			return "0";}
}
	
function getRAnswer($mysqli, $id){
	
	if ($stmt = $mysqli->prepare("SELECT * 
                                      FROM questionbank 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$id" to parameter. 
            $stmt->bind_param('i', $id);
            $stmt->execute();   // Execute the prepared query.
            $res = $stmt->get_result();
			if ($res->num_rows > 0) {
    			while ($row = $res->fetch_assoc()) {
        			$results = $row;
    			}
				
    		return $results["rightAnswer"];}
			else{
			return "0";}
		}
	
}
	
function gradeMP($mysqli){
	
			
			if(isset($_POST["q1"], $_POST["id"])){  	
				
				
				$answer = getRAnswer($mysqli, $_POST["id"]);
				
				if($answer == $_POST["q1"]){
					return "correct";}
					else{
						return "incorrect";
					}
				
			}
}

function getMP($mysqli){
	
	if(isset($_SESSION['user_id'])){

		$user_id = $_SESSION['user_id'];
	
		if ($stmt = $mysqli->prepare("SELECT * FROM `magicpoints` WHERE id = ?")) {
				// Bind "$id" to parameter. 
					$stmt->bind_param('s', $user_id);
					$stmt->execute();   // Execute the prepared query.
					$res = $stmt->get_result();
					if ($res->num_rows > 0) {
						while ($row = $res->fetch_assoc()) {
							$result = $row;
						}
					}
		}
				
			$jsonArray = array();
			
			
				array_push( $jsonArray, array( 
							"q1" => $result["q1"],
							"q2" => $result["q2"],
							"q3" => $result["q3"],
							"q4" => $result["q4"],
							"q5" => $result["q5"],
							"q6" => $result["q6"],
							"q7" => $result["q7"],
							"q8" => $result["q8"],
							"q9" => $result["q9"]
							));
	}
	
	return json_encode($jsonArray);
}

?>