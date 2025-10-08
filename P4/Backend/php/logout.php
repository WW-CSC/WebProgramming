<!-- Project 4 CSC-390 -->
<?php
require 'UserAuthenticator.php';
$authenticator = new UserAuthenticator();
$authenticator->logout();
header("Location: ../../Frontend/php/login.php")
?>