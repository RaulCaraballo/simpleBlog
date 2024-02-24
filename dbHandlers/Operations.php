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
            username VARCHAR(50) NOT NULL,
            city varchar(50),
            email VARCHAR(100) UNIQUE,
            password VARCHAR(1000)
        )";

        mysqli_query($this->connection, $sql);
    }

    public function createBlogTable()
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS blog_posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            author VARCHAR(100),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (author) REFERENCES Users(username)
        )";

        mysqli_query($this->connection,$sql);

    }
    public function selectBlog()
    {
        $this->createBlogTable();
        // Select blog posts from the database
        $sql = "SELECT id, title, content, author, created_at FROM blog_posts ORDER BY created_at DESC";
        $result = mysqli_query($this->connection,$sql);

        // Display blog posts
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h2>" . $row["title"] . "</h2>";
                echo "<p>By " . $row["author"] . " on " . $row["created_at"] . "</p>";
                echo "<div>" . $row["content"] . "</div>";
                echo "<hr>";
            }
        } else {
            echo "No blog posts found.";
        }

    }
    public function addPost($title, $content, $username)
    {
        $this->createBlogTable();
        $sql = "INSERT INTO blog_posts (title, content, author) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $this->connection->error);
        }

        $stmt->bind_param("sss", $title, $content, $username);

        if ($stmt->execute()) {
            echo "New blog post added successfully.";
        } else {
            echo "Error: " . $this->connection->error;
        }
        $stmt->close();
    }

    public function checkUser($email, $username)
    {
        // Prepare SQL statement with placeholders
        $sql = "SELECT email, username FROM Users WHERE email = ? AND username = ?";
        $stmt = mysqli_prepare($this->connection, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $username);

        // Execute query
        mysqli_stmt_execute($stmt);

        // Get result
        // Return result
        return mysqli_stmt_get_result($stmt);
    }
    public function selectUser($email, $username)
    {
        $sql = "SELECT username, email FROM Users WHERE email = ? AND username = ?";
        $stmt = mysqli_prepare($this->connection, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $username);

        // Execute query
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the row
        // Return the row if found, otherwise return false
        return mysqli_fetch_assoc($result);
    }



    public function registerUser($username,$city, $email, $password)
    {
        $sql = "INSERT INTO Users (username,city,email,password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->connection, $sql);

        mysqli_stmt_bind_param($stmt, "ssss", $username,$city, $email, $password);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_affected_rows($stmt) > 0;
    }

}