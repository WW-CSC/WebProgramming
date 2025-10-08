<?php
// Project 4 CSC-390 — Main page functionality (add/update/delete/filter games)

require("UserAuthenticator.php");
include_once('database.php');

// Start session and check authentication
$user = new UserAuthenticator();
if (!$user->isLoggedIn()) {
    header("Location: ../../Frontend/php/login.php");
    exit;
}

$db = new database();
$conn = $db->connect();
$actionHandled = false; // Flag to prevent duplicate redirect

// Delete Game 
if (isset($_POST['delete-game-button'])) {
    $backlog_id = $_POST['backlog_id'];
    $stmt = $conn->prepare("DELETE FROM backlog WHERE backlog_id = ?");
    if ($stmt) {
        $stmt->bind_param('i', $backlog_id);
        $stmt->execute();
        $_SESSION['string'] = "Game deleted successfully.";
    } else {
        $_SESSION['string'] = "Error deleting game.";
    }
    $actionHandled = true;
    redirectToMainPage();
}

// Add game 
if (isset($_POST['add-game-button'])) {
    $user_id = $_SESSION["id"];
    $date_created = date("Y-m-d");
    $name = $_POST['name-input'];
    $game_platform = $_POST['platform-input'];
    $status = $_POST['status-input'];
    $date_started = $_POST['popup-date-started'];
    $date_completed = $_POST['popup-date-completed'];

    $stmt = $conn->prepare("
        INSERT INTO backlog (user_id, date_created, game_name, game_platform, date_started, date_completed, status) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    "); // prepared statments
    $stmt->bind_param("issssss", $user_id, $date_created, $name, $game_platform, $date_started, $date_completed, $status);
    $stmt->execute();

    $actionHandled = true;
    redirectToMainPage();
}

// Status Updates 
$statusUpdates = [
    'mark-not-button'       => ['status' => 'notStarted', 'field' => 'date_started'],
    'mark-inprogress-button'=> ['status' => 'inprogress', 'field' => 'date_started'],
    'mark-completed-button' => ['status' => 'completed', 'field' => 'date_completed']
];

foreach ($statusUpdates as $postKey => $update) {
    if (isset($_POST[$postKey])) {
        $backlog_id = $_POST['backlog_id'];
        $field = $update['field'];
        $stmt = $conn->prepare("
            UPDATE backlog SET status = ?, {$field} = NOW() WHERE backlog_id = ?
        ");
        $stmt->bind_param('si', $update['status'], $backlog_id);
        $stmt->execute();
        $actionHandled = true;
        redirectToMainPage();
    }
}

// Filtering
if (!$actionHandled) {
    $games = [];
    $filter = $_POST['filter'] ?? 'all';

    if ($filter === 'all') {
        $query = "SELECT * FROM backlog WHERE user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $_SESSION['id']);
    } else {
        $query = "SELECT * FROM backlog WHERE status = ? AND user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $filter, $_SESSION['id']);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $games = $result->fetch_all(MYSQLI_ASSOC);
        $_SESSION['string'] = generateGameHTML($games);
    } else {
        $_SESSION['string'] = "No games added to list.";
    }

    redirectToMainPage();
}


// Function for the genration fo the games on the fronted
function generateGameHTML($rows) {
    $html = '';
    foreach ($rows as $row) {
        $html .= '<section class="flex output" id="row-' . $row['backlog_id'] . '">
            <div class="block">
                <div class="title sec right-border">Title: ' . htmlspecialchars($row['game_name']) . '<br></div>
                <div class="status sec right-border">Status: ' . htmlspecialchars($row['status']) . '<br></div>
                <div class="date sec">Date started: ' . htmlspecialchars($row['date_started']) . '<br></div>
                <div class="date sec">Date completed: ' . htmlspecialchars($row['date_completed']) . '<br></div>

                <form action="../../Backend/php/mainPage.php" method="post">
                    <input type="hidden" name="backlog_id" value="' . $row['backlog_id'] . '">
                    <button id="delete-game" name="delete-game-button" class="close">&times;</button>
                </form>

                <form action="../../Backend/php/mainPage.php" method="post">
                    <input type="hidden" name="backlog_id" value="' . $row['backlog_id'] . '">
                    <button name="mark-not-button">Mark as Not Started</button>
                    <button name="mark-inprogress-button">Mark as In Progress</button>
                    <button name="mark-completed-button">Mark as Completed</button>
                </form>
            </div>
        </section>';
    }
    return $html;
}

// redirect for reuse
function redirectToMainPage() {
    header("Location: ../../Frontend/php/mainPage.php");
    exit();
}

$conn->close();
?>
