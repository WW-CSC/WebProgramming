<!-- 
Project 3  
repater logic page 
-->
<?php
require("UserAuthenticator.php");
$x = rand(1,500);
if (isset($_POST['enter'])) {
    if(isset($_POST['userin']))
    {
        $out = '';
        for ($i=0; $i < $x ; $i++) { 
            $out = $out . $_POST['userin'] . "<br>" ;
        }
        $_SESSION['outmessage'] = $out;
        header("Location: ../repeater.php");
        exit();
    }else{ // i cannot get this to work i dont know why 
        $_SESSION['outmessage'] = "Failed to enter a sentence";
        header("Location: ../repeater.php");
        exit();
    }
}
