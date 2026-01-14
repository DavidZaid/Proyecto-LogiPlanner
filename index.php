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

        /* --- HEADER & NAVEGACIÓN CORREGIDA --- */
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
            text-transform: none;
            position: absolute;
            left: -280px; /* Esto se ajustará en el @media de abajo para móvil */
            top: 10px;
            z-index: 1500;
            pointer-events: none;
        }

        .nav__link--menu {
            display: flex;
            align-items: center;
            list-style: none;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            padding: 8px 15px;
            border-radius: 50px;
            margin: 0;
            gap: 5px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav__links {
            color: var(--text-white);
            text-decoration: none;
            font-weight: 600;
            padding: 10px 22px;
            transition: 0.3s;
            font-size: 1rem;
        }

        .nav__links:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            color: var(--accent-color);
        }

        .nav__login {
            background: var(--accent-color);
            color: #fff !important;
            border-radius: 25px;
            font-weight: 700 !important;
            box-shadow: 0 4px 15px rgba(0, 209, 209, 0.4);
            padding: 10px 30px !important;
        }

        /* --- HERO CONTENT --- */
        .hero__main {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 5% 80px;
        }

        .hero__container {
            flex: 1;
            max-width: 550px;
            z-index: 10;
        }

        .hero__title {
            font-size: 3.5rem;
            line-height: 1.1;
            margin-bottom: 25px;
            font-weight: 800;
        }

        .hero__paragraph {
            font-size: 1.2rem;
            margin-bottom: 35px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .cta {
            background: var(--accent-color);
            color: white;
            padding: 18px 45px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            transition: 0.4s;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .cta:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 209, 209, 0.4);
        }

        .image-container {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            z-index: 5;
        }

        .nav__img {
            width: 100%;
            max-width: 500px;
            height: auto;
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-25px); }
        }

        /* --- SECCIÓN SOLUCIONES --- */
        .services {
            padding: 100px 5%;
            background: white;
            text-align: center;
        }

        .services__table {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 35px;
            max-width: 1200px;
            margin: 60px auto 0;
        }

        .services__item {
            padding: 50px 35px;
            border-radius: 30px;
            background: #fff;
            transition: 0.4s;
            border: 1px solid #f0f0f0;
            box-shadow: 0 10px 40px rgba(0,0,0,0.04);
        }

        .services__item:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(42, 8, 122, 0.12);
        }

        .services__icon {
            font-size: 4rem;
            margin-bottom: 25px;
            display: block;
        }

        .services__item h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.6rem;
            font-weight: 700;
        }

        /* --- ESTADÍSTICAS --- */
        .stats {
            background: var(--primary-color);
            color: white;
            padding: 80px 5%;
            display: flex;
            justify-content: space-around;
            text-align: center;
            flex-wrap: wrap;
            gap: 40px;
        }

        .stat__item h2 { font-size: 3.8rem; margin-bottom: 5px; color: var(--accent-color); font-weight: 800; }

        /* --- TESTIMONIOS --- */
        .testimonials {
            padding: 100px 5%;
            background: var(--bg-light);
            text-align: center;
        }

        .testimonial__container {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .testimonial__card {
            background: white;
            padding: 40px;
            border-radius: 25px;
            max-width: 380px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            font-style: italic;
        }

        /* --- FOOTER --- */
        .footer {
            background: #0a0a0a;
            color: white;
            padding: 80px 5% 30px;
        }

        .footer__content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 50px;
            max-width: 1200px;
            margin: 0 auto 50px;
        }

        .footer__logo h2 { color: var(--accent-color); margin-bottom: 20px; font-size: 2rem; }
        .footer__links h3 { margin-bottom: 25px; border-bottom: 3px solid var(--accent-color); display: inline-block; padding-bottom: 8px; }
        .footer__links ul { list-style: none; padding: 0; }
        .footer__links ul li { margin-bottom: 12px; }
        .footer__links a { color: #aaa; text-decoration: none; transition: 0.3s; }
        .footer__links a:hover { color: white; padding-left: 10px; }

        .footer__social a {
            font-size: 1.6rem;
            color: white;
            margin-right: 20px;
            transition: 0.3s;
            display: inline-block;
        }
        .footer__social a:hover { color: var(--accent-color); transform: scale(1.2); }

        .footer__copy {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #222;
            color: #666;
            font-size: 0.95rem;
        }

        /* --- RESPONSIVE AJUSTADO SIN DAÑAR NADA --- */
        @media (max-width: 992px) {
            .hero__main { 
                flex-direction: column; 
                text-align: center; 
                padding-top: 20px;
            }
            .hero__container {
                max-width: 100%;
            }
            .image-container { 
                justify-content: center; 
                margin-top: 40px; 
            }
            .hero__title { 
                font-size: 2.2rem; /* Título más pequeño en móvil */
            }
            .nav { 
                height: auto; 
                padding: 20px 5%; 
                flex-direction: column; 
                gap: 20px; 
            }
            .nav__titulo { 
                position: static; /* Quitamos el absolute en móvil para que se vea */
                font-size: 2.2rem;
                margin-bottom: 10px;
                pointer-events: auto;
            }
            .nav__link--menu {
                width: 100%;
                justify-content: center;
                flex-wrap: wrap; /* Para que los botones bajen si no caben */
                padding: 10px;
                border-radius: 20px;
            }
            .nav__links {
                padding: 8px 12px;
                font-size: 0.9rem;
            }
            .nav__img {
                max-width: 300px;
            }
            .hero {
                clip-path: polygon(100% 0, 100% 95%, 50% 100%, 0 95%, 0 0); /* Ajuste de curva en móvil */
            }
        }

        @media (max-width: 480px) {
            .nav__link--menu {
                gap: 2px;
            }
            .nav__links {
                padding: 5px 8px;
                font-size: 0.8rem;
            }
            .nav__login {
                padding: 8px 15px !important;
            }
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
                <p class="hero__paragraph">Transforma la gestión de tu flota con datos en tiempo real y algoritmos de optimización de última generación.</p>
                <a href="login.php" class="cta">Prueba Gratis Ahora</a>
            </div>

            <div class="image-container">
                <img src="imagenes/portatil.gif" class="nav__img" alt="LogiPlanner Dashboard">
            </div>
        </div>
    </header>

    <section class="services">
        <h2 style="color: var(--primary-color); font-size: 3rem; font-weight: 800; margin-bottom: 10px;">Nuestras Soluciones</h2>
        <p style="color: #666; max-width: 700px; margin: 0 auto 50px;">Potencia tu logística con herramientas diseñadas para el futuro.</p>
        <div class="services__table">
            <article class="services__item">
                <span class="services__icon">🚚</span>
                <h3>Gestión de Flotas</h3>
                <p>Control total con tecnología GPS y telemetría de última generación para un monitoreo preciso de cada unidad.</p>
            </article>
            <article class="services__item">
                <span class="services__icon">📈</span>
                <h3>Optimización</h3>
                <p>Reduce hasta un 25% tus costos de combustible con rutas inteligentes diseñadas por IA en segundos.</p>
            </article>
            <article class="services__item">
                <span class="services__icon">📱</span>
                <h3>App Móvil</h3>
                <p>Asigna tareas y recibe reportes de tus conductores al instante desde cualquier lugar del mundo.</p>
            </article>
        </div>
    </section>

    <section class="stats">
        <div class="stat__item">
            <h2>+500</h2>
            <p style="font-size: 1.2rem; opacity: 0.8;">Empresas Confían</p>
        </div>
        <div class="stat__item">
            <h2>99%</h2>
            <p style="font-size: 1.2rem; opacity: 0.8;">Entregas a Tiempo</p>
        </div>
        <div class="stat__item">
            <h2>24/7</h2>
            <p style="font-size: 1.2rem; opacity: 0.8;">Soporte Técnico</p>
        </div>
    </section>

    <section class="testimonials">
        <h2 style="color: var(--primary-color); font-size: 2.8rem; font-weight: 800;">Lo que dicen nuestros clientes</h2>
        <div class="testimonial__container">
            <div class="testimonial__card">
                <p>"LogiPlanner redujo nuestros tiempos de entrega drásticamente. Un cambio total para nuestra logística."</p>
                <br>
                <strong>- Juan Pérez, TransLogist</strong>
            </div>
            <div class="testimonial__card">
                <p>"La interfaz es intuitiva y el soporte es excelente. No podríamos operar sin ellos ahora."</p>
                <br>
                <strong>- María Silva, EcoEntregas</strong>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer__content">
            <div class="footer__logo">
                <h2>LogiPlanner</h2>
                <p>Innovación en logística para empresas que no se detienen y buscan el máximo rendimiento operativo.</p>
            </div>
            <div class="footer__links">
                <h3>Compañía</h3>
                <ul>
                    <li><a href="#">Privacidad</a></li>
                    <li><a href="#">Términos de uso</a></li>
                    <li><a href="#">Preguntas Frecuentes</a></li>
                </ul>
            </div>
            <div class="footer__links">
                <h3>Contacto</h3>
                <ul>
                    <li><i class="fas fa-envelope" style="color: var(--accent-color)"></i> info@logiplanner.com</li>
                    <li><i class="fas fa-phone" style="color: var(--accent-color)"></i> +1 234 567 890</li>
                </ul>
            </div>
            <div class="footer__social">
                <h3>Síguenos</h3>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="footer__copy">
            &copy; 2026 LogiPlanner - Todos los derechos reservados.
        </div>
    </footer>

</body>
</html>