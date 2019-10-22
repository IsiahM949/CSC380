<html>
<head>
<title>Student Quiz Page</title>
</head>
<body>
<h1>Student Quiz Page</h1>
    
<!-- Displays the question from teacher.php -->
<div id="questionReceived">
<label>Question Received: </label>
<p id="question"></p>
</div>
    
<!-- question value from teacher.php -->
<?php $question = $_POST["question1"];?>
    
<script>
var question = '<?php echo $question;?>';
</script>
    
<!-- Upon clicking button, displays question from teacher.php -->
<button onclick="document.getElementById('question').innerHTML= question">Get Quesiton</button>


<!-- Sends the answer to the question received to teacher.php -->
<form action ="http://brahe.canisius.edu/~CSC380b/derKlicken/teacher1.php" method="post" id="student">
<div>
    <br>
    <label>Answer: </label>
    <input type ="text" name="answer1">
</div>
<br>
<input type = "submit" value="Submit Answer">
</form>

</body>    
</html>