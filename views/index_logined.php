<?php
session_start();
if (isset($_SESSION['userId'])){
    $username = $_SESSION['userId'];
}else{
    $username = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/indexStyle.css">
    <title>SimpleBlog</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../script/script.js"></script>
</head>

<body>
<header id="nav-wrapper">
    <nav id="nav">
        <div class="nav left">
            <a href="#home"><img src="../img/logo/logo.png" class="logo" alt="Logo"></a>
        </div>
        <div class="nav right">
            <a href="#gallery" class="nav-link active"><span class="nav-link-span"><span 
                            class="u-nav">Galería de fotos</span></span></a>
            <a href="#about" class="nav-link"><span class="nav-link-span"><span
                            class="u-nav">Sobre nosotros</span></span></a>
            <a href="#contact" class="nav-link"><span class="nav-link-span"><span
                            class="u-nav">Contacto</span></span></a>
            <a href="../views/login.php" class="nav-link"><span class="nav-link-span"><span class="u-nav"><span
                                class="cerrar">Cerrar sesión</span></span></span></a>
            <a href="#" class="nav-link"><span class="nav-link-span"><span class="u-nav"><span
                                class="perfil"><?= $username ?></span></span></span></a>
        </div>
    </nav>
</header>
<main>
    <section id="gallery">
        <h2>Galería de fotos</h2>
        <hr class="separator">
        <div class="gallery-container">
            <a class="uno" href="#img1"><img src="../img/Posts/imagen1.jpg" alt="Preview del juego 1"
                                             class="gallery-image imagen1"></a>
            <a class="dos" href="#img2"><img src="../img/Posts/imagen2.jpg" alt="Preview del juego 2"
                                             class="gallery-image imagen2"></a>
            <a class="tres" href="#img3"><img src="../img/Posts/imagen3.jpg" alt="Preview del juego 3"
                                              class="gallery-image imagen3"></a>
            <a class="cuatro" href="#img4"><img src="../img/Posts/imagen4.jpg" alt="Preview del juego 4"
                                                class="gallery-image imagen4"></a>
        </div>
        <div class="navigation">
            <button id="prevBtn">Anterior</button>
            <button id="nextBtn">Siguiente</button>
        </div>
    </section>
    <section id="home">
        <h2>Añande tu post</h2>
        <a href="addPost.php">
            <button class="add">Añadir Post</button>
        </a>
        <h2>Últimos Juegos</h2>
        <hr class="separator">
        <?php

        require_once("../controllers/OperationsController.php");
        require_once("../dbHandlers/dataBase.php");

        // Database connection settings
        $settings = parse_ini_file('../settings/settings.ini');
        $server = $settings['server'];
        $dbUsername = $settings['username'];
        $dbPassword = $settings['password'];
        $dbName = $settings['database'];

        try {
            // Create a new database connection
            $database = new dataBase($server, $dbUsername, $dbPassword, $dbName);
            $connection = $database->getConnection();

            // Create an instance of OperationsController
            $operationsController = new OperationsController($connection);

            // Get posts
            $operationsController->getPost($username);
            // Set the flag indicating default records have been inserted
            $_SESSION['default_records_inserted'] = true;
        } catch (Exception $e) {
            header('Location:index_Error_Page.html');
            //echo 'Error: ' . $e->getMessage();
        }
        ?>
    </section>
    <section id="about">
            <h2>Sobre Nosotros</h2>
            <hr class="separator">
            <p>Somos un equipo de entusiastas de los videojuegos, dedicados a explorar y compartir las maravillas del mundo del gaming.</p>
            <details>
                <summary>Ver más</summary>
                <p>Nuestra pasión nos impulsa a investigar, analizar y disfrutar de los últimos lanzamientos, clásicos atemporales y todo lo relacionado con la industria del entretenimiento interactivo.</p>
                <p>Descubre más sobre nuestro equipo, nuestras experiencias y lo que nos motiva a seguir adelante en esta emocionante aventura de los videojuegos.</p>
            </details>
        </section>
        <section id="contact">
            <h2>Contacto</h2> 
            <footer id="footer">
                <div class="footer-content">
                    <p class="p1">Contáctanos:</p>
                    <ul>
                        <li>Email: <a href="#">simpleBlog@gmail.com</a></li>
                        <li>Teléfono: +34 724685432</li>
                        <li>Dirección: Calle Principal 123, Collado Villalba, Madrid</li>
                    </ul>
                </div>
                <div class="footer-social">
                    <p class="p1">Síguenos en:</p>
                    <ul>
                        <li><a href="#"><img src="../img/logo/facebook.png" alt=""></a></li>
                        <li><a href="#"><img src="../img/logo/twitter.png" alt=""></a></li>
                        <li><a href="#"><img src="../img/logo/insta.png" alt=""></a></li>
                    </ul>
                </div>
            </footer>
        </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-description-btn').click(function() {
            $(this).siblings('.full-description').slideToggle();
            $(this).siblings('.short-description').slideToggle();
        });
    });
</script>

</body>

</html>