<!-- Project 4 CSC-390 -->
<?php
// Include the database connection
require('database.php');
$db = new database;
$conn = $db->connect();
// Variable to store error message (if any)
session_start();
$errorMessage = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form input values
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if the fields are empty
    if (empty($name) || empty($email) || empty($password)) {
         $_SESSION['error'] = 'Please fill in all fields.';
        header("Location: createAccount.php");
        exit();
    } else {
        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Database connection and insertion
        try {
            // Prepare the SQL query
            $stmt = $conn->prepare("INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $passwordHash); // "sss" means 3 strings
            $stmt->execute();
            
            // Redirect to login page after successful account creation
            header("Location: ../../Frontend/php/login.php");
            exit();
        } catch (Exception $e) {
            $error = 'Error creating account: ' . $e->getMessage();
        }
    }
}
?>
