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
        $sql = "
            CREATE TABLE IF NOT EXISTS Users (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(50) NOT NULL,
            city VARCHAR(50),
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
            img varchar(300),
            title VARCHAR(255) UNIQUE  NOT NULL,
            content TEXT NOT NULL,
            author VARCHAR(50),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        mysqli_query($this->connection, $sql);

    }
    public function fillBlogTable()
    {
        $sql = "
            INSERT INTO blog_posts (img, title, content, author, created_at) value ('imagen1.jpg', 'The Last Of Us Parte ||','Descripción breve del juego 1...', 'sesus', '2024-02-27 22:46:56' );
        ;";
        mysqli_query($this->connection, $sql);
        $sql = "
            INSERT INTO blog_posts (img, title, content, author, created_at) value ('imagen2.jpg', 'Spider-Man 2','Descripción breve del juego 2...', 'sesus', '2024-02-27 22:46:56' );
        ;";
        mysqli_query($this->connection, $sql);
        $sql = "
            INSERT INTO blog_posts (img, title, content, author, created_at) value ('imagen3.jpg', 'Hogwarts Legacy','Descripción breve del juego 3...', 'sesus', '2024-02-27 22:46:56' );
        ;";
        mysqli_query($this->connection, $sql);
        $sql = "
            INSERT INTO blog_posts (img, title, content, author, created_at) value ('imagen4.jpg', 'Outer Wilds','Descripción breve del juego 4...', 'sesus', '2024-02-27 22:46:56' );
        ;";
        mysqli_query($this->connection, $sql);
    }

    public function getPost()
    {
        // Select blog posts from the database
        $sql = "SELECT id, img, title, content, author,created_at FROM blog_posts";
        return mysqli_query($this->connection, $sql);

    }

    public function addPost($title, $content, $username, $fileName)
    {
        $sql = "INSERT INTO blog_posts (img, title, content, author) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $this->connection->error);
        }

        $stmt->bind_param("ssss", $fileName, $title, $content, $username);

        if ($stmt->execute()) {
            echo "New blog post added successfully.";
        } else {
            echo "Error: " . $this->connection->error;
        }
        $stmt->close();
    }
    public function deletePost($postId){
        $sql = "DELETE FROM blog_posts WHERE id = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param('i', $postId);

        $stmt->execute();
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

    public function selectUser($email, $password)
    {
        $sql = "SELECT username, email FROM Users WHERE email = ? AND $password = ?";
        $stmt = mysqli_prepare($this->connection, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        // Execute query
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the row
        // Return the row if found, otherwise return false
        return mysqli_fetch_assoc($result);
    }


    public function registerUser($username, $city, $email, $password)
    {
        $sql = "INSERT INTO Users (username,city,email,password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->connection, $sql);

        mysqli_stmt_bind_param($stmt, "ssss", $username, $city, $email, $password);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_affected_rows($stmt) > 0;
    }

}