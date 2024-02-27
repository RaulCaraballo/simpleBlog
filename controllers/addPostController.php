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
                if (isset($_POST['title'], $_POST['content'], $_FILES['image'])) {
                    $title = $_POST["title"];
                    $content = $_POST["content"];
                    $author = $_SESSION['userId'];

                    // File upload directory
                    $targetDir = "../img/Posts/"; // Directory where you want to store uploaded images
                    $fileName = basename($_FILES["image"]["name"]);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                    // Allow certain file formats
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                    if (in_array($fileType, $allowTypes, true)) {
                        // Upload file to server
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                            // Include database connection
                            try {
                                $tableController = new OperationsController($connection);
                                $tableController->addPost($title, $content, $author, $fileName); // Pass the filename to the addPost method
                            } catch (Exception $e) {
                                $_SESSION['userFound'] = false;
                            }
                            header('Location: ../views/index_logined.php');
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                } else {
                    echo "Please fill all fields.";
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
?>
