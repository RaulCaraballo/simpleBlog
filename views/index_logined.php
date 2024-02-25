<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/indexStyle.css">
    <title>SimpleBlog</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../script/indexScript.js"></script>
</head>

<body>
    <header id="nav-wrapper">
        <nav id="nav">
            <div class="nav left">
                <a href="#home"><img src="../img/logo.png" class="logo" alt="Logo"></a>                
            </div>
            <div class="nav right">
                <a href="#home" class="nav-link active"><span class="nav-link-span"><span class="u-nav">Home</span></span></a>
                <a href="#about" class="nav-link"><span class="nav-link-span"><span class="u-nav">Sobre nosotros</span></span></a>
                <a href="#contact" class="nav-link"><span class="nav-link-span"><span class="u-nav">Contacto</span></span></a>
                <a href="../views/login.php" class="nav-link"><span class="nav-link-span"><span class="u-nav"><span class="cerrar">Cerrar sesión</span></span></span></a>
                <a href="../views/registration.php" class="nav-link"><span class="nav-link-span"><span class="u-nav"><span class="registro">Registrarse</span></span></span></a>
            </div>
        </nav>
    </header>
    <main>
        <section id="home">
            <h2>Últimos Juegos</h2>
            <hr class="separator">
            <div class="game-preview">
                <img src="../img/imagen1.jpg" alt="Preview del juego 1" class="imagen1">
                <h3>The Last Of Us Parte ||</h3>
                <p>Descripción breve del juego 1...</p>
            </div>
            <div class="game-preview">
                <img src="../img/imagen2.jpg" alt="Preview del juego 2" class="imagen2">
                <h3>Spider-Man 2</h3>
                <p>Descripción breve del juego 2...</p>
            </div>
            <div class="game-preview">
                <img src="../img/imagen3.jpg" alt="Preview del juego 3" class="imagen3">
                <h3>Hogwarts Legacy</h3>
                <p>Descripción breve del juego 3...</p>
            </div>
            <div class="game-preview">
                <img src="../img/imagen4.jpg" alt="Preview del juego 4" class="imagen4">
                <h3>Outer Wilds</h3>
                <p>Descripción breve del juego 4...</p>
            </div>
        </section>
        <section id="about">
            <h2>Sobre Nosotros</h2>
            <p>Somos un equipo apasionado por los videojuegos...</p>
        </section>
        <section id="contact">
            <h2>Contacto</h2>
            <p>Ponte en contacto con nosotros...</p>
        </section>
    </main>
    
</body>

</html>
