<?php

class Operations
{
    private $connection;

    public function __construct($connection) //constructor
    {
        $this->connection = $connection;
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Users (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(100),
            password VARCHAR(1000)
        )";

        mysqli_query($this->connection, $sql);
    }

    public function checkUser($email, $password)
    {
        // Prepare SQL statement with placeholders
        $sql = "SELECT email, password FROM Users WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($this->connection, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        // Execute query
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        // Return result
        return $result;
    }
}