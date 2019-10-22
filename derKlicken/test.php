<html>
<head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<style>
body {background-color: #f489bd;}
div {width:20%; margin:auto;}
button {width:20%; margin: 0 auto; display: block;}
* {font-family: Verdana}
</style>
</head>
<body>
<h1 style="font-family: Verdana; text-align:center;">Teacher Quiz Page</h1>
<?php
// php array for questions and answers from the corresponding files
//$questions = file("questions.txt", FILE_IGNORE_NEW_LINES);
//$answers = file("answers.txt", FILE_IGNORE_NEW_LINES);

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
<textarea = rows="5" cols="50" name="question" id="send" style="resize: none;"></textarea>
</div>
<br>
<input type="submit" value="Send Question" onclick="return chk()" style="font-family: Verdana; margin: 0 auto; width:50%; display:block">
</form>
<p id="msg"></p>

<!-- Displays the answer for the selected question from var answers -->    
<div id= "selectedAnswer">
<label>Correct Answer:</label>
<p id="correctAnswer"></p>    
</div>
<button onclick = "window.location.href= 'addQuestion.php'" class = "btn"> AddQuestion</button>
<button onclick = "window.location.href= 'updateQuestion.php'" class = "btn"> UpdateQuestion</button>
<button onclick = "window.location.href= 'delQuestion.php'" class = "btn"> DeleteQuestion</button>


<!-- answer value from student.php -->
<?php $answer = $_POST["answer"]; ?>
    
<!-- Displays the answer received from student.php -->
<div id = "answerReceived">
<lable>Answer received:</lable>
<p id="answer"></p>
</div>
    
<!-- javascript that updates every element in teacher.php -->
<script>
var answer = '<?php echo $answer;?>';
var questions = <?php echo '["' . implode('", "', $questions) . '"]' ?>;
alert(questions);
var answers = <?php echo '["' . implode('", "', $answers) . '"]' ?>;
document.getElementById("Questions").options.length = 0;
var selectObj = document.getElementById("Questions");
for (var i = 0; i < questions.length; i++)
{
    var optName = i.toString();
    var option = document.createElement("option");
    option.value = optName;
    option.text = questions[i];
    selectObj.add(option);
}
    
//function to update the textarea based on question chosen from the select element
function myFunction()
{
    var selectIndex = selectObj.selectedIndex;
    var object = selectObj.options[selectIndex];
    var text = object.text;
    document.getElementById("send").value = text;
    document.getElementById("correctAnswer").innerHTML = answers[selectIndex];
}


document.getElementById("answer").innerHTML = answer;
</script>
</body>

</html>
