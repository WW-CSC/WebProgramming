<!-- 
Project 3  
date time logic page 
-->
<?php
require("UserAuthenticator.php");
$user = new UserAuthenticator;
if (!$user -> isLoggedIn()) {
    header("Location: login.php");
}
$currentDate = date('m/d/Y h:i A');
$_SESSION['datetime'] = $currentDate;