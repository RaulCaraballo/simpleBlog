<?php
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

$settings = parse_ini_file('../settings/settings.ini');
$server = $settings['server'];
$username = $settings['username'];
$password = $settings['password'];
$dbName = $settings['database'];

try {
    $database = new dataBase($server, $username, $password, $dbName);
    $connection = $database->getConnection();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['email'], $_POST['password'])) {
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];

            try {
                $tableController = new OperationsController($connection);
                $result = $tableController->registerUser($userEmail, $userPassword);
                if (!$result){
                    $_SESSION['newUser'] = false;
                    header('Location: ../views/login.php');
                    exit();
                }
                $_SESSION['newUser'] = true;
                header('Location: ../views/login.php');
                exit(); // Make sure to exit after redirecting
            } catch (Exception $e) {
                $_SESSION['newUser'] = false;
                header('Location: ../views/login.php');
                exit(); // Make sure to exit after redirecting
            }
        }
    }
} catch (Exception $e) {
    echo 'Error al conectarse a servidor';
}
