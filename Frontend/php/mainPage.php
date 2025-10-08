<!-- Project 4  -->
<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script defer src="../js/mainPopups.js"></script>
</head>
<body>
    <header><h1>Games</h1></header>

    <section class="flex">
        <div id="selection" class="block">

            <div class="sec">
                <button data-popup-target="#addGame">Add Game</button>
            </div>

            <div class="sec">
                <form method="POST" action="../../Backend/php/mainPage.php">    
                    Filter:
                    <select name="filter" id="filter">
                        <option value="all">All</option>
                        <option value="completed">Completed</option>
                        <option value="inprogress">In Progress</option>
                        <option value="notStarted">Not Started</option>
                    </select>
                    <button type="submit">Reload</button>
                </form>
            </div>

            <div class="sec">
                <form method="POST" action="../../Backend/php/logout.php">
                    <button id="logout">Logout</button>
                </form>
            </div>
        </div>
    </section>
    <!-- holds the games if you have had added any -->
    <section id="row-container">
        <div>
            <h2>Your Current Games</h2>
            <?php
            if (isset($_SESSION['string'])) {
                echo $_SESSION['string'];
            } else {
                echo "<p>No games to display.</p>";
            }
            ?>
        </div>
    </section>

    <div class="popup" id="addGame">
        <div class="pop-header">
            <h1>Add Game</h1>
            <button data-popup-close class="close">&times;</button>
        </div>

        <form class="popup-form" id="inputs" action="../../Backend/php/mainPage.php" method="POST">
            <div class="popup-inputs">
                <label for="name-input">Game Name</label><br>
                <input id="name-input" type="text" placeholder="Game Name" name="name-input" required><br>

                <label for="status-input">Status</label><br>
                <select id="status-input" name="status-input" required>
                    <option value="completed">Completed</option>
                    <option value="inprogress">In Progress</option>
                    <option value="notStarted">Not Started</option>
                </select><br>

                <label for="platform-input">Platform</label><br>
                <input id="platform-input" type="text" placeholder="Platform" name="platform-input" required><br>

                <label for="popup-date-started">Date Started</label><br>
                <input type="date" id="popup-date-started" name="popup-date-started" required><br>

                <label for="popup-date-completed">Date Completed</label><br>
                <input type="date" id="popup-date-completed" name="popup-date-completed" required><br>
            </div>
            <button type="submit" name="add-game-button">Add</button>
        </form>
    </div>

    <div id="overlay"></div>

</body>
</html>
