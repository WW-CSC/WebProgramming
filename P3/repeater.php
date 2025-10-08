<!-- 
Project 3  
sentence repater page
-->
<!DOCTYPE html>
<head>
<link href="Styles/p3style.css" type = "text/css" rel="stylesheet" />
<?php require("back/repeaterback.php"); ?>
</head>
<body>
    <form action="back/repeaterback.php" method="POST">
        <div><input type="text" name="userin" placeholder="Sentence"></div>
        <div><button type="submit" name = "enter">submit and clear page</button></div> 
        <!-- i cannot get the page to clear unless i select he submit button again and if i fo it doesnt print out my warning mesage -->
    </form>
    <?php if(isset($_SESSION['outmessage'])){
        echo $_SESSION['outmessage'];
    }
    ?>
<div class="pageChanges">
        <p id="boxes"><a href="date.php"> Date</a><br>Current date and time</p>
        <p id="boxes"><a href="rps.php"> Play </a><br>Rock Paper Scissors</p>
        <p id="boxes"><a href="index.php"> menu </a></p>
        <p id="boxes"><a href="logout.php"> logout </a></p>
        <p id="boxes">Return <br><a href="../index.html">Project Explorer</a></p>
</div>
</body>