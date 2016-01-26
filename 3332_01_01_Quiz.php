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
      <!-- InstanceBeginEditable name="Header" -->
      <h2 style="text-align: center; font-size: 80px; line-height: 1.3;">Practice Quiz 1</h2>
      <!-- InstanceEndEditable -->
      <?php
  
        echo "<form action='quiz_grade.php' method='post' name='quiz'> 
              <h4>Double check your answers and when you are ready, press submit to review your score.</h4>
              <br />
              <br />";
        
      $questionSet = range(1,30);
        shuffle($questionSet);
        
        for ($x = 1; $x <= 10; $x++){
            
            $id = $questionSet[$x];
            
            $questionInfo = getQuestion($mysqli, $id, "numbers");
            
            $question = $questionInfo['question'];
            
            $type = $questionInfo['qType'];
            
            $rightAnswers[$x] = $questionInfo['rightAnswer'];
           
            switch($type){
            
                case 'mc': //Multiple Choice Question
                    
                    $answer = mixAnswers($questionInfo, 4);
                    
                    echo "<P>". $x .". " . $question . "<BR>
                    <input type='radio' name='q" . $x . "' value='". $answer[0] . "'> a) ". $answer[0] . "<BR>
                    <input type='radio' name='q" . $x . "' value='". $answer[1] . "'> b) ". $answer[1] . "<BR>
                    <input type='radio' name='q" . $x . "' value='". $answer[2] . "'> c) ". $answer[2] . "<BR>
                    <input type='radio' name='q" . $x . "' value='". $answer[3] . "'> d) ". $answer[3] . "<BR>
                    </p>
                    <BR>" ;
                    
                    break;
                
                case 'tf': //True False question
                
                    $answer = mixAnswers($questionInfo, 2);
                    
                    echo "<P>". $x .". " . $question . "<BR>
                    <input type='radio' name='q" . $x . "' value='". $answer[0] . "'> a) ". $answer[0] . "<BR>
                    <input type='radio' name='q" . $x . "' value='". $answer[1] . "'> b) ". $answer[1] . "<BR>
                    </p>
                    <BR>";
                    
                    break;
                
                case 'fr': //Free Response Question
                
                    echo "<P>". $x .". " . $question . "<BR>
                    Answer: <input type='text' name='q" . $x . "' value=''><BR>
                    </p>
                    <BR>";
                    
                    break;
            }
        }
        
        echo "<input type='hidden' name='rAnswers' value='" . serialize($rightAnswers) . "'>";

        echo"<hr />
            <input type='submit' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' value='Submit'>
            <input type='reset' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' value='Reset'>
            <br />
            <br />
            <br />
          </form>";
        ?>
        
        
        </div>
        <?php
        
        $attempts = 5;
        
          if (isset($_POST['startPQuiz'])){
            
              
                
                $attempts = $attempts - 1;
            
              
            
            }
        
        $attemptsLeft = "Attempts left: " . $attempts;    
           
        ?>
    </div>
</main>

<?php
include("footer.php");
?>