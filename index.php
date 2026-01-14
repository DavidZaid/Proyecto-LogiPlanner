<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogiPlanner | Inteligencia Logística</title>

    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #2a087a;
            --accent-color: #00d1d1;
            --bg-light: #f4f7fe;
            --text-white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            overflow-x: hidden;
        }

        /* SOLO ESTILOS GENERALES / DESKTOP */
        .hero {
            position: relative;
            min-height: 100vh;
            background-image: linear-gradient(180deg, #370a8ae0 0%, var(--primary-color) 100%);
            clip-path: polygon(100% 0, 100% 88%, 50% 100%, 0 88%, 0 0);
            color: var(--text-white);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 120px;
            padding: 0 5%;
            max-width: 1300px;
            margin: 0 auto;
            position: relative;
            z-index: 1000;
        }

        .nav__titulo {
            font-size: 2.6rem;
            font-weight: 900;
            color: #fff;
            letter-spacing: -1.5px;
            position: absolute;
            left: -280px;
            top: 10px;
            z-index: 1500;
        }

        .nav__link--menu {
            display: flex;
            align-items: center;
            list-style: none;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 8px 15px;
            border-radius: 50px;
            gap: 5px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav__links {
            color: var(--text-white);
            text-decoration: none;
            font-weight: 600;
            padding: 10px 22px;
            font-size: 1rem;
        }

        .nav__login {
            background: var(--accent-color);
            color: #fff !important;
            border-radius: 25px;
            font-weight: 700;
            padding: 10px 30px !important;
        }
    </style>
</head>

<body>

<header class="hero">
    <nav class="nav">
        <h2 class="nav__titulo">LogiPlanner</h2>
        <ul class="nav__link--menu">
            <li><a href="quienes.php" class="nav__links">Nosotros</a></li>
            <li><a href="funciona.php" class="nav__links">Cómo funciona</a></li>
            <li><a href="productos.php" class="nav__links">Productos</a></li>
            <li><a href="contacto.php" class="nav__links">Contacto</a></li>
            <li><a href="login.php" class="nav__links nav__login">Login</a></li>
        </ul>
    </nav>

    <div class="hero__main">
        <div class="hero__container">
            <h1 class="hero__title">Eficiencia logística en la palma de tu mano</h1>
            <p class="hero__paragraph">
                Transforma la gestión de tu flota con datos en tiempo real y algoritmos de optimización de última generación.
            </p>
            <a href="login.php" class="cta">Prueba Gratis Ahora</a>
        </div>

        <div class="image-container">
            <img src="imagenes/portatil.gif" class="nav__img" alt="LogiPlanner Dashboard">
        </div>
    </div>
</header>

</body>
</html>
