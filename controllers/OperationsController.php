<?php
//imports
require_once("../dbHandlers/Operations.php");

class OperationsController
{
    private $connection;
    private $tableOperations;

    public function __construct($connection) // constructor
    {
        $this->connection = $connection;
        $this->tableOperations = new Operations($connection);
    }

    public function checkUser($email, $password)
    {
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);

        $result = $this->tableOperations->checkUser($email, $password);

        return ($result && $result->num_rows > 0) ? $result : false;
    }

    public function addPost($title, $content, $user_id){
        $title = mysqli_real_escape_string($this->connection,$title);
        $content = mysqli_real_escape_string($this->connection,$content);
        $user_id = mysqli_real_escape_string($this->connection,$user_id);

        return $this->tableOperations->addPost($title,$content,$user_id);
    }

    public function registerUser($email, $password)
    {

        $this->tableOperations->createUserTable();
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);
        $userExist = $this->tableOperations->checkUser($email,$password);
        if (!$userExist){
            return false;
        }
        return $this->tableOperations->registerUser($email, $password);
    }
    public function selectUser($email, $password)
    {
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);

        $result = $this->tableOperations->selectUser($email, $password);

        return isset($result) ? $result : false;
    }
}
