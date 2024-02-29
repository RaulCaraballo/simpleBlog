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
    <link rel="stylesheet" href="../style/addPostStyle.css">
</head>
<body>

<form action="../controllers/addPostController.php" method="post" enctype="multipart/form-data">
    <h1>Añade tu post</h1>
    <hr class="separator">
    <label for="title">Título:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="content">Contenido:</label><br>
    <textarea id="content" name="content" rows="5"></textarea><br>
    <label for="image">Sube una imagen:</label><br>
    <input type="file" id="image" name="image"><br> <!-- Input for image upload -->
    <input type="submit" value="Enviar">
</form>

</body>
</html>
