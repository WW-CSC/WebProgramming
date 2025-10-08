<!-- 
Project 3  
userauthentication page 
-->
<?php
session_start();
class UserAuthenticator
{
    var $username ;
    var $password ; 

    private const CORRECTPASSWORD  = "Webprogramming";
    private const CORRECTUSERNAME = "CSC-390";

    function isLoggedIn() : Bool
    {

        if(!isset($_SESSION["login"])||!$_SESSION["login"] == true)
        {
            return false;
        }
        
        return true;
    }

    function authenticate($username, $password) : Bool
    {
        $this->username = $username;
        $this->password = $password;
        if($username == self::CORRECTUSERNAME && $password == self::CORRECTPASSWORD)
        {
            return true; 
        }
        return false; 
    }

    function logUserIn()
    {
        $_SESSION["login"] = true;
    }
    function logout()
    {
        $_SESSION["login"] = false;
    }
    function redirectToLogin()
    {
        header("Location: ../login.php");
    }

}
