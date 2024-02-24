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

    public function checkUser($email, $username)
    {
        $email = mysqli_real_escape_string($this->connection, $email);
        $username = mysqli_real_escape_string($this->connection, $username);

        return $this->tableOperations->selectUser($email, $username);
    }

    public function addPost($title, $content, $username){
        $title = mysqli_real_escape_string($this->connection,$title);
        $content = mysqli_real_escape_string($this->connection,$content);
        $username = mysqli_real_escape_string($this->connection,$username);

        $this->tableOperations->addPost($title,$content,$username);
    }

    public function registerUser($username,$city, $email, $password)
    {

        $this->tableOperations->createUserTable();
        $username = mysqli_real_escape_string($this->connection,$username);
        $city = mysqli_real_escape_string($this->connection,$city);
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);
        $userExist = $this->tableOperations->checkUser($email,$username);
        if (!$userExist){
            return false;
        }
        return $this->tableOperations->registerUser($username,$city,$email, $password);
    }
    public function selectUser($email, $username)
    {
        $email = mysqli_real_escape_string($this->connection, $email);
        $username = mysqli_real_escape_string($this->connection, $username);

        $result = $this->tableOperations->selectUser($email, $username);

        return isset($result) ? $result : false;
    }
}
