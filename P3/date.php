<!-- 
Project 3  
date time page
-->
<!DOCTYPE html>
<head>
<link href="Styles/p3style.css" type = "text/css" rel="stylesheet" />
<?php require("back/dateback.php"); ?>
</head>
<body>
    <p>The current date and time is <br><?php echo $_SESSION['datetime'] ?></p>
    <div class="pageChanges">
    <p id="boxes"><a href="index.php"> menu</a></p>
    <p id="boxes"><a href="rps.php"> Play </a><br>Rock Paper Scissors</p>
    <p id="boxes"><a href="repeater.php"> repeat </a><br> Sentence repeater</p>
    <p id="boxes"><a href="logout.php"> logout </a></p>
    <p id="boxes">Return <br><a href="../index.html">Project Explorer</a></p>
</div>
</body>