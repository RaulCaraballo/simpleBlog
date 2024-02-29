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

        return $this->tableOperations->checkUser($email, $username);
    }

    public function addPost($fileName, $title, $content, $username)
    {

        $title = mysqli_real_escape_string($this->connection, $title);
        $content = mysqli_real_escape_string($this->connection, $content);
        $username = mysqli_real_escape_string($this->connection, $username);
        $fileName = mysqli_real_escape_string($this->connection, $fileName);

        $this->tableOperations->createBlogTable();
        $this->tableOperations->addPost($fileName, $title, $content, $username);
    }

    public  function getPost($username)
    {
        $this->tableOperations->createBlogTable();
        $result = $this->tableOperations->getPost();

        if ($result && mysqli_num_rows($result) > 0) {
            // Loop through each row of the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Output HTML for each game preview
                echo '<div class="game-preview">';
                echo '<img src="../img/Posts/' . $row["img"] . '" alt="Preview del juego" class="imagen1">';
                echo '<h3>' . $row["title"] . '</h3>';

                // Convert full description to short description
                $shortDescription = $this->truncateString($row["content"]); // Adjust the length as needed

                // Display short description
                echo '<p class="short-description">' . $shortDescription . '</p>';

                // Display full description with animation, initially hidden
                echo '<p class="full-description" style="display:none;">' . $row["content"] . '</p>';

                echo '<p>' . $row["author"] . '</p>';
                echo '<p>' . $row["created_at"] . '</p>';

                // Button to toggle full description visibility
                echo '<button class="toggle-description-btn">Mostrar descripción completa</button>';

                // Check if the logged-in user is the author of the post
                if ($username === $row["author"]) {
                    // Display delete button
                    echo '<form action="../controllers/deletePost.php" method="post">';
                    echo '<input type="hidden" name="postId" value="' . $row["id"] . '">';
                    echo '<button type="submit" name="deleteBtn">Delete</button>';
                    echo '</form>';
                }
                echo '</div>';
            }
        } else {
            echo "No posts found.";
        }
    }

// Function to truncate a string to a specific length
    private function truncateString($string)
    {
        if (strlen($string) > 100) {
            $string = substr($string, 0, 100);
            $string = rtrim($string); // Remove any trailing spaces
            $string .= '...'; // Add ellipsis to indicate truncation
        }
        return $string;
    }

    public function deletePost($postId)
    {
        $postId = mysqli_real_escape_string($this->connection, $postId);
        $this->tableOperations->deletePost($postId);
    }

    public function fillBlogTable()
    {
        $this->tableOperations->fillBlogTable();
    }

    public function registerUser($username, $city, $email, $password)
    {

        $this->tableOperations->createUserTable();
        $username = mysqli_real_escape_string($this->connection, $username);
        $city = mysqli_real_escape_string($this->connection, $city);
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);
        $userExist = $this->tableOperations->checkUser($email, $username);
        if (!$userExist) {
            return false;
        }
        return $this->tableOperations->registerUser($username, $city, $email, $password);
    }

    public function selectUser($email, $password)
    {
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);

        $result = $this->tableOperations->selectUser($email, $password);

        return isset($result) ? $result : false;
    }
}
