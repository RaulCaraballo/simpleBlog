<?php

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


session_start();
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
                    // Create an associative array to store the submitted data
                    $formData = array(
                        'title' => $_POST['title'],
                        'content' => $_POST['content']
                    );

                    // Create an object from the submitted data
                    $blogPost = (object)$formData;

                    $jsonString = json_encode($blogPost);

                    $filename = 'blogPost.json';
                    file_put_contents($filename,$jsonString);

                    try {
                        $tableController = new OperationsController($connection);

                        $tableController->addPost();
                    }catch (Exception $e){
                        return false;
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






