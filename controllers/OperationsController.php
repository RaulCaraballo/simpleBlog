<?php

//imports
require_once "dbhandlers/Operations.php";

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
        // Sanitize user input
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);

        $result = $this->tableOperations->checkUser($email, $password);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
            // Handle the user found case here
        }
    return null;
    }
}
