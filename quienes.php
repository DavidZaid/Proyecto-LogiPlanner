<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros | LogiPlanner</title>
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
            background-color: var(--bg-light);
            color: #333;
        }

        /* --- HEADER ESTILO INDEX (MENÚ CENTRADO EN PC) --- */
        .nav-container {
            background: linear-gradient(180deg, #370a8ae0 0%, var(--primary-color) 100%);
            padding: 10px 0;
            position: relative;
            z-index: 1000;
        }

        .nav {
            display: flex;
            align-items: center;
            height: 100px;
            padding: 0 5%;
            max-width: 1300px;
            margin: 0 auto;
            position: relative;
        }

        .nav__titulo {
            font-size: 2.6rem;
            font-weight: 900;
            color: #fff;
            letter-spacing: -1.5px;
            text-decoration: none;
            position: absolute;
            left: 20px; 
            z-index: 10;
        }

        .nav__link--menu {
            display: flex;
            align-items: center;
            list-style: none;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 8px 15px;
            border-radius: 50px;
            margin: 0 auto; 
            gap: 5px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .nav__links {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 20px;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .nav__links:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            color: var(--accent-color);
        }

        /* --- BOTÓN HAMBURGUESA --- */
        .nav__btn-hamburguesa {
            display: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            position: absolute;
            right: 20px;
            z-index: 100;
        }

        /* --- SECCIÓN HERO NOSOTROS --- */
        .about-hero {
            padding: 100px 5% 80px;
            text-align: center;
            background: white;
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
        }

        .about-hero h1 {
            font-size: 3.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            font-weight: 800;
        }

        .about-hero p {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.2rem;
            color: #666;
            line-height: 1.6;
        }

        /* --- SECCIÓN MISIÓN Y VISIÓN --- */
        .mision-vision {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            max-width: 1100px;
            margin: -50px auto 80px;
            padding: 0 5%;
        }

        .mv-card {
            background: white;
            padding: 45px;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            transition: 0.4s;
            text-align: center;
            border: 1px solid #eee;
        }

        .mv-card:hover { transform: translateY(-12px); box-shadow: 0 20px 50px rgba(0,0,0,0.12); }

        .mv-card i {
            font-size: 3.5rem;
            color: var(--accent-color);
            margin-bottom: 25px;
        }

        .mv-card h2 { color: var(--primary-color); margin-bottom: 15px; font-weight: 700; }

        /* --- NUESTRA HISTORIA --- */
        .history {
            padding: 80px 5%;
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 60px;
            flex-wrap: wrap;
        }

        .history-text { flex: 1; min-width: 320px; }
        .history-text h2 { color: var(--primary-color); font-size: 2.8rem; margin-bottom: 20px; font-weight: 800; }
        
        .history-img { 
            flex: 1; 
            min-width: 320px; 
            border-radius: 30px;
            box-shadow: 25px 25px 0 var(--accent-color);
            object-fit: cover;
            height: 400px;
        }

        /* --- VALORES --- */
        .values {
            background: var(--primary-color);
            color: white;
            padding: 100px 5%;
            text-align: center;
        }

        .values h2 { font-size: 3rem; font-weight: 800; margin-bottom: 50px; }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .value-item i { font-size: 2.8rem; color: var(--accent-color); margin-bottom: 20px; }
        .value-item h3 { font-size: 1.5rem; margin-bottom: 15px; }
        .value-item p { opacity: 0.8; line-height: 1.5; }

        /* --- FOOTER --- */
        .footer { background: #0a0a0a; color: white; padding: 60px 5%; text-align: center; border-top: 1px solid #222; }

        /* --- ARREGLO FINAL DEL MENÚ MÓVIL --- */
        @media (max-width: 992px) {
            .nav__btn-hamburguesa {
                display: block;
            }

            .nav { 
                height: 80px; 
                justify-content: space-between;
                padding: 0 20px;
            }

            .nav__titulo { 
                position: static; 
                font-size: 1.8rem;
            }

            .nav__link--menu { 
                display: none; 
                flex-direction: column;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background: #2a087a; /* Color sólido para que no se trasluzca texto */
                border-radius: 0;
                padding: 30px 0;
                border: none;
                backdrop-filter: none;
                gap: 0; /* Quitamos el espacio para controlar el padding manual */
            }

            .nav__link--menu.is-active {
                display: flex;
                box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            }

            .nav__link--menu li {
                width: 100%;
                text-align: center;
            }

            .nav__links {
                display: block;
                width: 100%;
                padding: 15px 0;
                font-size: 1.1rem;
                border-radius: 0;
            }

            /* Estilo especial para el login en móvil para que no flote feo */
            .nav__link--menu li:last-child a {
                background: var(--accent-color) !important;
                color: var(--primary-color) !important;
                margin: 10px 20px !important;
                border-radius: 10px !important;
                display: inline-block;
                width: 80%;
            }

            .history { text-align: center; }
            .history-img { box-shadow: 15px 15px 0 var(--accent-color); height: auto; }
            .about-hero h1 { font-size: 2.5rem; }
        }
    </style>
</head>
<body>

    <div class="nav-container">
        <nav class="nav">
            <a href="index.php" class="nav__titulo">LogiPlanner</a>
            
            <div class="nav__btn-hamburguesa" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>

            <ul class="nav__link--menu" id="nav-links">
                <li><a href="quienes.php" class="nav__links">Nosotros</a></li>
                <li><a href="funciona.php" class="nav__links">Cómo funciona</a></li>
                <li><a href="productos.php" class="nav__links">Productos</a></li>
                <li><a href="contacto.php" class="nav__links">Contacto</a></li>
                <li><a href="login.php" class="nav__links" style="background: var(--accent-color); border-radius: 25px; font-weight: 700; margin-left: 10px;">Login</a></li>
            </ul>
        </nav>
    </div>

    <header class="about-hero">
        <h1>Nuestra Pasión es la Logística</h1>
        <p>En LogiPlanner, no solo creamos software; construimos el puente entre tu empresa y la máxima eficiencia operativa del siglo XXI.</p>
    </header>

    <section class="mision-vision">
        <div class="mv-card">
            <i class="fas fa-rocket"></i>
            <h2>Misión</h2>
            <p>Empoderar a empresas de todos los tamaños con tecnología de vanguardia para simplificar procesos logísticos complejos y reducir el impacto ambiental.</p>
        </div>
        <div class="mv-card">
            <i class="fas fa-eye"></i>
            <h2>Visión</h2>
            <p>Ser el estándar global en plataformas de inteligencia logística, siendo reconocidos por nuestra innovación constante y el éxito de nuestros clientes.</p>
        </div>
    </section>

    <section class="history">
        <div class="history-text">
            <h2>Desde 2018 Innovando</h2>
            <p>LogiPlanner nació de una necesidad real: la falta de visibilidad en las cadenas de suministro. Empezamos como un pequeño equipo de ingenieros y hoy somos una comunidad que mueve miles de toneladas diariamente.</p>
            <p>Nuestra cultura se basa en la transparencia, el análisis de datos y, sobre todo, en escuchar a quienes están en la ruta cada día.</p>
        </div>
        <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Almacén logístico" class="history-img">
    </section>

    <section class="values">
        <h2>Nuestros Valores Core</h2>
        <div class="values-grid">
            <div class="value-item">
                <i class="fas fa-shield-alt"></i>
                <h3>Seguridad</h3>
                <p>Protegemos tus datos y tu flota como si fueran nuestros.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-lightbulb"></i>
                <h3>Innovación</h3>
                <p>Si existe una forma más rápida de hacerlo, la encontraremos.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-handshake"></i>
                <h3>Compromiso</h3>
                <p>Tu éxito operativo es nuestro único indicador de logro.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-leaf"></i>
                <h3>Sostenibilidad</h3>
                <p>Optimizamos rutas para un planeta más limpio.</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2024 LogiPlanner - Innovación que mueve al mundo.</p>
    </footer>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const navLinks = document.getElementById('nav-links');

        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('is-active');
            const icon = menuToggle.querySelector('i');
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        });
    </script>
</body>
</html>