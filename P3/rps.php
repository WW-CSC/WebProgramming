<!-- 
Project 3  
rock paper scissors input page
-->
<!DOCTYPE html>
<head>
    <link href="Styles/p3style.css" type = "text/css" rel="stylesheet" />
    <?php require("back/rpsback.php");?>
</head>
<body>
<form action="back/playrpsback.php" method="POST">
        <div id="rpsbuttons">
            <div><img class="rps" src="jpgs/rock.png" alt=""><br><input type="radio" name="rps" value="rock">Rock</button></div>
            <div><img class="rps" src="jpgs/paper.png" alt=""><br><input type="radio" name = "rps" value="paper">Paper</button></div>
            <div><img class="rps" src="jpgs/scissors.png" alt=""><br><input type="radio" name = "rps" value="scissors">Scissors</button></div>
        </div>
        <br><br>
        <div id="enterOrReset">
            <div><button type="submit">submit</button></div>
            <div><button type="reset"> reset</button></div>
        </div>
    </form>
<div class="pageChanges">
    <p id="boxes"><a href="date.php"> Date</a><br>Current date and time</p>
    <p id="boxes"><a href="index.php"> menu </a></p>
    <p id="boxes"><a href="repeater.php"> repeat </a><br> Sentence repeater</p>
    <p id="boxes"><a href="logout.php"> logout </a></p>
    <p id="boxes">Return <br><a href="../index.html">Project Explorer</a></p>
</div>
</body>