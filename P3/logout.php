<!-- 
Project 3  
logout page
-->
<!DOCTYPE html>
<head>
    <link href="Styles/p3style.css" type = "text/css" rel="stylesheet" />
    <?php require("back/logoutback.php") ?>
</head>
<body>
    <form action="back/logoutback.php" method="post">
        <button type="submit" name="logout">logout</button>
    </form>
    <div class="pageChanges">
    <p id="boxes"><a href="date.php"> Date</a><br>Current date and time</p>
    <p id="boxes"><a href="rps.php"> Play </a><br>Rock Paper Scissors</p>
    <p id="boxes"><a href="repeater.php"> repeat </a><br> Sentence repeater</p>
    <p id="boxes"><a href="index.php"> menu </a></p>
    <p id="boxes">Return <br><a href="../index.html">Project Explorer</a></p>
</div>
</body>