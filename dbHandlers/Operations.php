<?php

class Operations
{
    private $connection;

    public function __construct($connection) //constructor
    {
        $this->connection = $connection;
    }

    public function createUserTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS Users (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            email VARCHAR(100) UNIQUE,
            password VARCHAR(1000)
        )";

        mysqli_query($this->connection, $sql);
    }

    public function createBlogTable()
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS blogPosts(
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        mysqli_query($this->connection,$sql);

    }
    public function addPost($jsonString)
    {
        $this->createBlogTable();
        $sql = "INSERT INTO blog_posts (json_data) VALUES ('$jsonString')";
        return $this->connection->query($sql) === TRUE;
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
        // Return result
        return mysqli_stmt_get_result($stmt);
    }

    public function registerUser($email, $password)
    {

        $sql = "INSERT INTO Users (email, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->connection, $sql);

        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_affected_rows($stmt) > 0;
    }

}