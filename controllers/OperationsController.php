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


    public function registerUser($email, $password)
    {

        $this->tableOperations->createTable();
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);
        $userExist = $this->tableOperations->checkUser($email,$password);
        if (!$userExist){
            return false;
        }
        return $this->tableOperations->registerUser($email, $password);
    }
}
