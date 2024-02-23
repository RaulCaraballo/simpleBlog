<?php
// Start the session (if not already started)
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userId'])){
    $_SESSION["userLogin"] = false;
    header('Location:login.php');
}
// Get the logged-in user's ID from the session
$user_id = $_SESSION["userId"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog Post</title>
</head>
<body>
<h1>Add Blog Post</h1>
<form action="../controllers/addPostController.php" method="post">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="content">Content:</label><br>
    <textarea id="content" name="content" rows="5"></textarea><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
