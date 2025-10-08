<!-- 
Project 3  
index logic page 
-->
<?php
require("UserAuthenticator.php");
$user = new UserAuthenticator;
if (!$user -> isLoggedIn()) {
    header("Location: login.php");
}