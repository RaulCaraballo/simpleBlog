<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/indexStyle_unlogined.css">
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
            <a href="#gallery" class="nav-link active"><span class="nav-link-span"><span class="u-nav">Galería de fotos</span></span></a>
            <a href="addPost.php" class="nav-link"><span class="nav-link-span"><span class="u-nav">Blogs</span></span></a>
            <a href="#about" class="nav-link"><span class="nav-link-span"><span class="u-nav">Sobre nosotros</span></span></a>
            <a href="#contact" class="nav-link"><span class="nav-link-span"><span class="u-nav">Contacto</span></span></a>
            <a href="../views/login.php" class="nav-link"><span class="nav-link-span"><span class="u-nav"><span class="iniciar">Iniciar sesión</span></span></span></a>
            <a href="../views/registration.php" class="nav-link"><span class="nav-link-span"><span class="u-nav"><span class="registro">Registrarse</span></span></span></a>
        </div>
    </nav>
</header>
<main>
    <section id="gallery">
            <h2>Galería de fotos</h2>
            <hr class="separator">
            <div class="gallery-container">
                <a class="uno" href="#img1"><img src="../img/Posts/imagen1.jpg" alt="Preview del juego 1" class="gallery-image imagen1"></a>
                <a class="dos" href="#img2"><img src="../img/Posts/imagen2.jpg" alt="Preview del juego 2" class="gallery-image imagen2"></a>
                <a class="tres" href="#img3"><img src="../img/Posts/imagen3.jpg" alt="Preview del juego 3" class="gallery-image imagen3"></a>
                <a class="cuatro" href="#img4"><img src="../img/Posts/imagen4.jpg" alt="Preview del juego 4" class="gallery-image imagen4"></a>
            </div>
            <div class="navigation">
                <button id="prevBtn">Anterior</button>
                <button id="nextBtn">Siguiente</button>
            </div>
        </section>
        <section id="home">
            <h2>Últimos Juegos</h2>
            <hr class="separator">
            <div class="game-preview">
                <img id="img1" src="../img/Posts/imagen1.jpg" alt="Preview del juego 1" class="imagen1">
                <h3>The Last Of Us Parte ||</h3>
                <p>Ambientado cinco años después de The Last of Us (2013), el juego se centra en dos personajes jugables en un Estados Unidos post-apocalíptico cuyas vidas se entrelazan: Ellie, que busca venganza después de sufrir una tragedia, y Abby, una soldado que se ve envuelta en un conflicto entre su milicia y un culto religioso ...</p>
            </div>
            <div class="game-preview">
                <img id="img2" src="../img/Posts/imagen2.jpg" alt="Preview del juego 2" class="imagen2">
                <h3>Spider-Man 2</h3>
                <p>Marvel's Spider-Man 2 es un juego para un jugador. Sin embargo, podrás jugar tanto con Peter Parker como con Miles Morales. Cambia entre los heroicos hombres araña para luchar contra el crimen y descubre las habilidades y los elementos argumentales que los hacen únicos...</p>
            </div>
            <div class="game-preview">
                <img id="img3" src="../img/Posts/imagen3.jpg" alt="Preview del juego 3" class="imagen3">
                <h3>Hogwarts Legacy</h3>
                <p>Hogwarts Legacy es un juego de rol inmersivo en mundo abierto que se inspira de los libros de la saga Harry Potter. Disfruta del Hogwarts del siglo XIX. Tu personaje es un alumno o alumna del famoso colegio que tiene la clave de un antiguo secreto que amenaza con destruir el mundo mágico.</p>
            </div>
            <div class="game-preview">
                <img id="img4" src="../img/Posts/imagen4.jpg" alt="Preview del juego 4" class="imagen4">
                <h3>Outer Wilds</h3>
                <p>Outer Wilds es una aventura de misterio en un mundo abierto acerca de un sistema solar atrapado en un bucle temporal infinito. ¡Te damos la bienvenida al programa espacial! Eres el nuevo recluta de Outer Wilds Ventures, un nuevo programa espacial que busca respuestas en un extraño sistema solar en constante evolución.</p>
            </div>
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

</body>
