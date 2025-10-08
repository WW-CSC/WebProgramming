<!-- 
Project 3  
login logic page 
-->
<?php
require("UserAuthenticator.php");
$user = new UserAuthenticator;
$username = $_POST["username"];
$password = $_POST["password"];
if($user -> authenticate($username, $password)){
    $user-> logUserIn();
    header("Location: ../index.php");
}else{
    header("Location: ../login.php");
}