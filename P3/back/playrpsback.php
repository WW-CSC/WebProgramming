<!-- 
Project 3  
play rps logic page 
-->
<?php
require("UserAuthenticator.php");
$user = new UserAuthenticator;
if (!$user -> isLoggedIn()) {
    header("Location: login.php");
}


if(isset($_POST['rps']))
{
    $choice = $_POST['rps'];
    $comChoice = computer_rps();
    $player = "You entered: $choice.";
    $computer = "Computer picked: $comChoice.";
    $wld;
    switch ($choice) {
        case "rock" && $comChoice == "scissors":
            $wld = "you win";
            break;
        case "rock" && $comChoice == "paper":
            $wld = "you lose";
            break;
        case "rock" && $comChoice == "rock":
            $wld = "draw";
            break;
        case "paper" && $comChoice == "scissors":
            $wld = "you lose";
            break;
        case "paper" && $comChoice == "paper":
            $wld = "draw";
            break;
        case "paper" && $comChoice == "rock":
            $wld = "you win";
            break;
        case "scissors" && $comChoice == "rock":
            $wld = "you lose";
            break;
        case "scissors" && $comChoice == "paper":
            $wld = "you win";
            break;
        default:
            $wld = "draw";
            break;
    }
    $formatted = "$player <br>$computer <br>$wld";
    $_SESSION['out'] = $formatted;
    header("Location: ../playrps.php");
}else{
    $_SESSION['out'] = null;
    header("Location: ../playrps.php");
}

function computer_rps() : string {
    $comChoise = "";
    $x = rand(1,3);
    switch ($x) {
    case 1:
        $comChoise = "rock";
        break;
    
    case 2:
        $comChoise = "paper";
        break;
    case 3:
        $comChoise = "scissors";
        break;
    }
    return $comChoise;
}