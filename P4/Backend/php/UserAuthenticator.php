<!-- Project 4 CSC-390 -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
}
require('database.php');
// the security of the website
class UserAuthenticator
{
    var $email ;
    var $password ; 


    function isLoggedIn() : Bool
    {

        if(!isset($_SESSION["login"])||!$_SESSION["login"] == true)
        {
            return false;
        }
        
        return true;
    }

    function authenticate($email, $password) : Bool
    {
        $this->email = $email;
        $this->password = $password;
        $db = new database;
        $conn = $db->connect();
        // Prepare the SQL query to fetch the password hash based on email
        $stmt = $conn->prepare("SELECT password_hash FROM user WHERE email = ?");
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $result = $stmt->get_result();
        // Check if a matching email was found
        if ($result->num_rows > 0) {
            // Fetch the password hash from the result
            $row = $result->fetch_assoc();
            $password_hash = $row['password_hash'];
            // check passwod with password verify
            if (password_verify($this->password, $password_hash)) {
                return true; // Password matches
            }
        }
        return false;
    }

    function logUserIn($email)
    {
        $_SESSION["login"] = true;
        $db = new database;
        $conn = $db->connect();
        $stmt = $conn->prepare("SELECT user_id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userId);
        $stmt->fetch();
        $_SESSION["id"] = $userId;
    
    }
    function logout()
    {
        $_SESSION["login"] = false;
    }
    function redirectToLogin()
    {
        header("Location: ../../Frontend/php/login.php");
        exit;
    }

}