<!-- Project 4 CSC-390 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../css/styles.css">
    <?php require("../../Backend/php/createAccount.php")?>
    <script defer src="../js/model.js"></script>
</head>
<body>
    
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <p id="errorMessage"></p>
        </div>
    </div>

    <script>
        const serverErrorMessage = <?= json_encode($errorMessage) ?>;
    </script>

    <header><h1>Create Account</h1></header>

    <section class="form-container">
        <form method="POST" action="../php/createAccount.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Your Password" required>
            </div>
            
            <div class="form-group">
                <button type="submit">Create Account</button>
            </div>
        </form>
    </section>

    <footer>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </footer>
</body>
</html>