<?php

try {
    require_once("../dbHandlers/dataBase.php");
}catch (Exception $e){
    echo 'Error dataBase not found';

}

try {
    require_once("OperationsController.php");
}
catch (Exception $e){
    echo 'Error operationController not found';
}


session_start();
$settings = parse_ini_file('settings.ini');
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
                        if ($result !== null){
                            echo "login successful";
                        }else{
                            $_SESSION['userFound'] = false;
                            header('Location: login.php');
                        }
                    }catch (Exception $e){
                        echo "login Error";
                    }
                }
            } catch (Exception $e) {
                echo 'Input error';
                exit();
            }
        }
    }catch (RuntimeException $e){
        echo "Not a POST method sended";  //Print's on a screen custom error message
    }
} catch (Exception $e) {
    echo 'Error al conectarse a servidor';
}






