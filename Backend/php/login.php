<!-- Project 4 CSC-390 -->
<?php
require('UserAuthenticator.php');
$authenticator = new UserAuthenticator();
$_SESSION["failedlogin"] = "";

if ($authenticator->isLoggedIn()) 
{
    header("Location: ../../Frontend/php/mainPage.php");
    exit;
}
//an empty error variable to handle any authentication failures
$error = '';
// Checks if the HTTP request method is POST for indicating that the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
   
    // Uses the null coalescing operator to assign an empty string if no value is provided
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Attempts to authenticate the user using the provided username and password
    if ($authenticator->authenticate($email, $password)) 
    {
        // If authentication is successful, logs the user in
        $authenticator->logUserIn($email);
        
        // Redirects the user to the main page (Index.php) after a successful login
        header("Location: ../../Frontend/php/mainPage.php");
        exit; // Ends the script execution to prevent further processing after the redirect
    } 
    else 
    {
        // If authentication fails, sets an error message
        $_SESSION["failedlogin"] = 'Incorrect username or password';
        header("Location: ../../Frontend/php/login.php");
    }
}

    
    


    




