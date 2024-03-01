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
    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if (isset($_POST['email'], $_POST['password'])) {
                    $userEmail = $_POST['email'];
                    $userPassword = $_POST['password'];
                    try {
                        $tableController = new OperationsController($connection);
                        $result = $tableController->checkUser($userEmail, $userPassword);
                        if ($result !== false && $result !== null) {
                            // User found, proceed with login
                            $userData = $tableController->selectUser($userEmail, $userPassword); // return user id as expected
                            if (!$userData){
                                $_SESSION['userFound'] = false;
                                header('Location: ../views/login.php');
                                exit();
                            }
                            $_SESSION['userId'] = $userData['username'];
                            header('Location: ../views/index_logined.php');

                        } else {
                            $_SESSION['userFound'] = false;
                            header('Location: ../views/login.php');
                        }
                        exit();
                    } catch (Exception $e) {
                        $_SESSION['userFound'] = false;
                        header('Location: ../views/login.php');
                        exit();
                    }
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






