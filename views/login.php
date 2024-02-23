<?php
session_start();

$errorLoginMessage = isset($_SESSION['userFound']) && !$_SESSION['userFound'] ? "Login or password is wrong" : false;
$RegisterMessage = isset($_SESSION['newUser']) && $_SESSION['newUser'] ? "Successful registration":false;

// Destroy the session after checking the error messages
session_destroy();
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../style/loginStyle.css">
</head>
<body>
<div id="wrapper">
    <div id="mainBox">
        <div id="content">
            <div id="welcomeMsg" class="element left">
                <h1>
                    ¡BIENVENIDO JUGADOR!
                </h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores dolore est eum eveniet
                    itaque perferendis porro quo sed sunt.</p>
            </div>
            <div id="loginForm" class="element right">
                <form action="../controllers/AuthenticationController.php" method="post" id="mainForm">
                    <label for="login">
                        Correo electrónico
                        <br>
                        <input type="email" name="email" id="login" value="">
                    </label>
                    <br>
                    <label for="password">
                        Contraseña
                        <br>
                        <input type="password" name="password" id="password" value="">
                    </label>
                    <br>
                    <label for="submit">
                        <input type="submit" name="submit" value="Sign In" id="submitData">
                    </label>
                    <label for="register">
                        <a href="registration.php">¿No tienes cuenta? ¡REGISTRATE YA CON UN CLICK!</a>
                    </label>
                    <?php if (!empty($errorLoginMessage)): ?>
                        <div class="errorMessage"><?= $errorLoginMessage ?></div>
                    <?php endif; ?>

                    <?php if (!$RegisterMessage): ?>
                        <div class="registerMessage"><?= $RegisterMessage ?></div>
                    <?php else: ?>
                        <div class="registerMessage"><?= $RegisterMessage ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
