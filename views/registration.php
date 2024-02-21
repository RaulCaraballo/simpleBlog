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
                    ¡Bienvenido!
                </h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus asperiores dolore est eum eveniet
                    itaque perferendis porro quo sed sunt.</p>
            </div>
            <div id="loginForm" class="element right">
                <form action="../controllers/RegistrationController.php" method="post" id="mainForm">
                
                    <label for="nombre" name="nombre" id="nombre">
                        Nombre
                        <br>
                        <input type="nombre" name="nombre" id="nombre" value="">
                    </label>
                    <br>
                    <label for="apellidos" name="apellidos" id="apellidos">
                        Apellidos
                        <br>
                        <input type="apellidos" name="apellidos" id="apellidos" value="">
                    </label>
                    <br>
                    <label for="ciudad" name="ciudad" id="ciudad">
                        Ciudad
                        <br>
                        <input type="ciudad" name="ciudad" id="ciudad" value="">
                    </label>
                    <br>
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
                        <input type="submit" name="submit" value="Sign Up" id="submitData">
                    </label>
                    <label for="register">
                        <a href="login.php">¿Ya tienes cuenta?</a>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
