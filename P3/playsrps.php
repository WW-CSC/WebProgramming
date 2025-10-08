<!-- 
Project 3  
rock paper scissors page
-->
<!DOCTYPE html>
<head>
    <link href="Styles/p3style.css" type = "text/css" rel="stylesheet" />
    <?php require("back/rpsback.php");?>
</head>
<body>
<?php
if (isset($_SESSION['out'])) {
    echo $_SESSION['out'];
} else {
    echo "You failed to select correctly please go back to the page and reselect your answer.";
}
?>
<div class="pageChanges">
    <p id="boxes"><a href="date.php"> Date</a><br>Current date and time</p>
    <p id="boxes"><a href="repeater.php"> repeat </a><br> Sentence repeater</p>
    <p id="boxes"><a href="rps.php"> go again </a><br> Rock paper Scissors</p>
    <p id="boxes"><a href="index.php"> menu </a></p>
    <p id="boxes">Return <br><a href="../index.html">Project Explorer</a></p>
</div>
</body>