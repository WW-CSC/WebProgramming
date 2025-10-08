<!-- Project 4 CSC-390 -->
<!DOCTYPE html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="../css/styles.css">
  <?php require("../../Backend/php/login.php")?>
</head>

<body>
  <header>
    <h1>Login</h1>
  </header>

  <section>
    <?php 
    if(isset($_SESSION["failedlogin"])){
        echo $_SESSION["failedlogin"];
    } ?>
    <form action="../php/login.php" method="post">
        <div><input type="email" name="email" placeholder="Email" required></div>
        <div><input type="password" name="password" placeholder="Password" required></div>
        <div>
          <button name="enter" type="submit">Enter</button> 
          <!-- This button redirects to the create account page -->
          <a href="createAccount.php"><button type="button">Create Account</button></a>
        </div>
    </form>
  </section>
</body>
</html>

