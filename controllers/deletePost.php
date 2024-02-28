// deletePost.php

<?php
session_start();

if (isset($_SESSION['userId'])) {
    require_once("../controllers/OperationsController.php");
    require_once("../dbHandlers/dataBase.php");

    // Database connection settings
    $settings = parse_ini_file('../settings/settings.ini');
    $server = $settings['server'];
    $dbUsername = $settings['username'];
    $dbPassword = $settings['password'];
    $dbName = $settings['database'];

    try {
        // Create a new database connection
        $database = new dataBase($server, $dbUsername, $dbPassword, $dbName);
        $connection = $database->getConnection();

        // Create an instance of OperationsController
        $operationsController = new OperationsController($connection);

        // Check if postId is set and call deletePost function
        if (isset($_POST['postId'])) {
            $postId = $_POST['postId'];
            $operationsController->deletePost($postId);
            // Redirect back to the homepage or wherever you want
            header("Location: ../views/index_logined.php");
            exit();
        }
    } catch (Exception $e) {
        header('Location:index_Error_Page.html');
        //echo 'Error: ' . $e->getMessage();
    }
}
?>
