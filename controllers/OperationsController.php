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

    public function addPost($fileName, $title, $content, $username){

        $title = mysqli_real_escape_string($this->connection,$title);
        $content = mysqli_real_escape_string($this->connection,$content);
        $username = mysqli_real_escape_string($this->connection,$username);
        $fileName = mysqli_real_escape_string($this->connection,$fileName);

        $this->tableOperations->createBlogTable();
        $this->tableOperations->addPost($fileName, $title,$content,$username);
    }
    public function getPost()
    {
        $this->tableOperations->createBlogTable();
        $result = $this->tableOperations->getPost();

        if (mysqli_num_rows($result) > 0) {
            // Loop through each row of the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Output HTML for each game preview
                echo '<div class="game-preview">';
                echo '<img src="../img/Posts/' . $row["img"] . '" alt="Preview del juego" class="imagen1">';
                echo '<h3>' . $row["title"] . '</h3>';
                echo '<p>' . $row["content"] . '</p>';
                echo '<p>' . $row["author"] . '</p>';
                echo '<p>' . $row["created_at"] . '</p>';
                echo '</div>';
            }
        }
    }
    public function fillBlogTable()
    {
        $this->tableOperations->fillBlogTable();
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
    public function selectUser($email, $password)
    {
        $email = mysqli_real_escape_string($this->connection, $email);
        $password = mysqli_real_escape_string($this->connection, $password);

        $result = $this->tableOperations->selectUser($email, $password);

        return isset($result) ? $result : false;
    }
}
