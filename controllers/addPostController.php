<?php
// Start the session (if not already started)
session_start();
try {
    require_once("../dbHandlers/dataBase.php");
} catch (Exception $e) {
    echo 'Error message';
}

try {
    require_once("OperationsController.php");
} catch (Exception $e) {
    echo 'Error operationController not found';
}
// Check if the user is logged in
if (!isset($_SESSION["userId"])) {
    // Redirect the user to the login page or display an error message
    header("Location: login.php");
    exit; // Stop executing the script
}

$settings = parse_ini_file('../settings/settings.ini');
$server = $settings['server'];
$username = $settings['username'];
$password = $settings['password'];
$dbName = $settings['database'];
try {
    $database = new dataBase($server, $username, $password, $dbName);
    $connection = $database->getConnection();
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if (isset($_POST['title'], $_POST['content'])) {
                    $title = $_POST["title"];
                    $content = $_POST["content"];
                    $author = $_SESSION['userId'];
                    try {
                        $tableController = new OperationsController($connection);
                        $result = $tableController->addPost($title,$content,$author);
                    } catch (Exception $e) {
                        $_SESSION['userFound'] = false;
                    }
                    header('Location: ../views/index_unlogined.php');
                }
            } catch (Exception $e) {
                echo 'Input error';
                exit();
            }
        }
    } catch (RuntimeException $e) {
        echo "Not a POST method sended";  //Print's on a screen custom error message
    }
} catch (Exception $e) {
    echo 'Error al conectarse a servidor';
}


//// Process the form submission
//if ($_SERVER["REQUEST_METHOD"] === "POST") {
//    // Retrieve form data
//
//
//
//
//
//    $mysqli->close();
//}
?>
