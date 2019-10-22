<html>
<head>
<title>Student Quiz Page</title>
<style>
body {background-color: #f3f489;}
div {width:10%; margin:auto;}
* {font-family: Verdana}
</style>
</head>
<body>
<h1 style="font-family: Verdana; text-align:center;">Student Quiz Page</h1>
    
<!-- Displays the question from teacher.php -->
<div id="questionReceived">
<label style="font-family: Verdana; text-align:center;">Question Received: </label>
<p id="question"></p>
</div>
    
<!-- question value from teacher.php -->
<?php $question = $_POST["question"];?>
    
<script>
var question = '<?php echo $question;?>';
</script>
    
<!-- Upon clicking button, displays question from teacher.php -->
<div><button onclick="document.getElementById('question').innerHTML=question" style="font-family: Verdana; margin:auto; width:100%;">Get Question</button></div>


<!-- Sends the answer to the question received to teacher.php -->
<form action ="http://brahe.canisius.edu/~CSC380b/derKlicken/teacher.php" method="post" id="student">
<div>
    <br>
    <label style="font-family: Verdana";>Answer: </label>
    <input type ="text" name="answer">
</div>
<br>
<div><input type = "submit" value="Submit Answer" style="font-family: Verdana; margin:auto; width:100%"></div>
</form>


</body>    
</html>