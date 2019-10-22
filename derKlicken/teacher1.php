 <html>
<head>
    <script src="http://code.jquery.com/jquery-1.9.1.js">
            $(document).ready(function() {
                $('#sub').click(function() {
                    $.post("http://brahe.canisius.edu/~CSC380b/derKlicken/student1.php",
                    {question1: $('#send').val(), },
                    function() {
                        
                    }
                });
            });
    </script>
</head>
<body>
<h1>Teacher Quiz Page</h1>
    
<?php
//sesson_start();
// php array for questions and answers from the corresponding files
$hostname = 'brahe.canisius.edu';
$username = 'CSC380b';
$password = 'rome73';
$db_name = 'CSC380b_p1';
$mysql = new mysqli($hostname, $username, $password, $db_name);

$titles = array();
$questions = array();
//$tagsAr = array();
$types = array();
$classes = array();
$responsesArray = array();
$answers = array();

$count = 0;    

if (mysqli_connect_errno())
{
    echo mysqli_connect_error();
}
else
{
    $result = $mysql->query("SELECT * FROM questions;");
    if ($result)
    {
        while ($row = $result->fetch_assoc())
        {
            $title = $row["title"];
            $question = $row["question"];
            $tags = $row["tags"];
            $type = $row["type"];
            $class = $row["classes"];
            $responses = $row["responses"];
            $answer = $row["answer"];

            if (strlen($responses) > 0)
            {
                $array1[$count] = $responses;
                //$stuff = explode(",", $responses);
                //array_push($responsesArray, $stuff);
            }
        
            array_push($titles, $title);
            array_push($questions, $question);
            //array_push($tagsAr, $tags);
            array_push($types, $type);
            array_push($classes, $class);
            array_push($answers, $answer);
            $count++;
        }
        
        
        $result->close();
        $mysql->next_result();
    }
    
    else
    {
        echo($mysql->error);
    }
    
    $mysql->close();
}

//$json_array = json_encode($questions);
//$answers = file("answers.txt", FILE_IGNORE_NEW_LINES);
echo $array1[0];
?>
    
<!-- Displays the drop down menu for questions to select -->
<form name="questionForm">
<div id="questionOptions">
<select onchange="myFunction()" id="Questions", form="questionForm" size = "1">
<option value="0">Question 1</option>
<option value="1">Question 2</option>
<option value="2">Question 3</option>
</select>
</div>
</form>
    
<!-- Send the question selected to student.php --> 
<form id="teacher">
<div id="sendQuestion">
<label>Question To Send:</label>
<textarea = rows"3" cols "50" name="question1", id="send"></textarea>
</div>
<br>
<input type="submit" value="Send Question" id="sub">
</form>
<p id="msg"></p>

<!-- Displays the answer for the selected question from var answers -->    
<div id= "selectedAnswer">
<label>Correct Answer:</label>
<p id="correctAnswer"></p>    
</div>

<!-- answer value from student.php -->
<?php $answer = $_POST["answer1"]; ?>
    
<!-- Displays the answer received from student.php -->
<div id = "answerReceived">
<label>Answer received:</label>
<p id="answer"></p>
</div> 
    

<!-- javascript that updates every element in teacher.php -->
<script>
var questions = <?php echo '["' . implode('", "', $questions) . '"]' ?>;
var titles = <?php echo '["' . implode('", "', $titles) . '"]' ?>;
var answer = '<?php echo $answer;?>';
var answers = <?php echo '["' . implode('", "', $answers) . '"]' ?>;
document.getElementById("Questions").options.length = 0;
var selectObj = document.getElementById("Questions");
for (var i = 0; i < titles.length; i++)
{
    var optName = i.toString();
    var option = document.createElement("option");
    option.value = optName;
    option.text = titles[i];
    selectObj.add(option);
}
    
//function to update the textarea based on question chosen from the select element
function myFunction()
{
    var selectIndex = selectObj.selectedIndex;
    //var object = selectObj.options[selectIndex];
    //var text = object.text;
    document.getElementById("send").value = questions[selectIndex];
    document.getElementById("correctAnswer").innerHTML = answers[selectIndex];
}

document.getElementById("answer").innerHTML = answer;

</script>
</body>

</html>