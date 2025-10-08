<!-- Project 4 CSC-390 -->
<?php
class database {
    
    function connect() {
        // Connect to the database to retrieve the game data
        $conn = mysqli_connect('localhost', 'root', '', 'user_system');
        // Check if the connection is successful
        if (!$conn) {
            // If connection fails, output an error message and stop execution
            die("Connection failed: " . mysqli_connect_error());
        }
        // Return the connection if needed
        return $conn;
    }
}
