<!-- 
Project 3  
logout logic page 
-->
<?php
if (isset($_POST['logout'])) {
    session_unset();
    header("Location: ../login.php");
}