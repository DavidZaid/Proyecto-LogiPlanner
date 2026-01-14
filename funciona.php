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

        /* --- HEADER ESTILO INDEX (MENÚ CENTRADO) --- */
        .nav-container {
            background: linear-gradient(180deg, #370a8ae0 0%, var(--primary-color) 100%);
            padding: 10px 0;
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

        /* --- HERO NOSOTROS --- */
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

        /* --- TARJETAS DE ENFOQUE --- */
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

        .mv-card:hover { transform: translateY(-12px); }

        .mv-card i {
            font-size: 3.5rem;
            color: var(--accent-color);
            margin-bottom: 25px;
        }

        .mv-card h2 { color: var(--primary-color); margin-bottom: 15px; font-weight: 700; }

        /* --- HISTORIA Y ACTUALIDAD --- */
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
            height: 350px;
        }

        /* --- VALORES CORE --- */
        .values {
            background: var(--primary-color);
            color: white;
            padding: 100px 5%;
            text-align: center;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 50px auto 0;
        }

        .value-item i { font-size: 2.8rem; color: var(--accent-color); margin-bottom: 20px; }

        .footer { background: #0a0a0a; color: white; padding: 60px 5%; text-align: center; }

        @media (max-width: 992px) {
            .nav { height: auto; padding: 30px 20px; flex-direction: column; }
            .nav__titulo { position: static; margin-bottom: 25px; }
            .nav__link--menu { width: 100%; justify-content: center; flex-wrap: wrap; }
        }
    </style>
</head>
<body>

    <div class="nav-container">
        <nav class="nav">
            <a href="index.php" class="nav__titulo">LogiPlanner</a>
            <ul class="nav__link--menu">
                <li><a href="quienes.php" class="nav__links">Nosotros</a></li>
                <li><a href="funciona.php" class="nav__links">Cómo funciona</a></li>
                <li><a href="productos.php" class="nav__links">Productos</a></li>
                <li><a href="contacto.php" class="nav__links">Contacto</a></li>
                <li><a href="login.php" class="nav__links" style="background: var(--accent-color); border-radius: 25px; font-weight: 700; margin-left: 10px;">Login</a></li>
            </ul>
        </nav>
    </div>

    <header class="about-hero">
        <h1>Control Total de tu Stock</h1>
        <p>LogiPlanner es la herramienta definitiva para la gestión de inventarios, diseñada para empresas que buscan orden, rapidez y precisión en sus almacenes.</p>
    </header>

    <section class="mision-vision">
        <div class="mv-card">
            <i class="fas fa-boxes"></i>
            <h2>Gestión Ágil</h2>
            <p>Nuestra plataforma permite agregar, editar y eliminar productos en tiempo real, manteniendo tu inventario siempre actualizado con solo un par de clics.</p>
        </div>
        <div class="mv-card">
            <i class="fas fa-map-marked-alt"></i>
            <h2>Visión de Futuro</h2>
            <p>Estamos evolucionando. Próximamente, LogiPlanner integrará un sistema inteligente de enrutamiento para conectar tu inventario directamente con la logística de entrega.</p>
        </div>
    </section>

    <section class="history">
        <div class="history-text">
            <h2>Simplicidad en cada proceso</h2>
            <p>Entendemos que el corazón de cualquier negocio logístico es su stock. Por eso, nos enfocamos en ofrecer una interfaz limpia donde puedas gestionar tus activos sin complicaciones técnicas.</p>
            <p>Ya sea que necesites actualizar existencias o depurar productos obsoletos, nuestra app web garantiza que la información fluya sin errores entre tu equipo.</p>
        </div>
        <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Gestión de Almacén" class="history-img">
    </section>

    <section class="values">
        <h2>Nuestros Pilares</h2>
        <div class="values-grid">
            <div class="value-item">
                <i class="fas fa-check-circle"></i>
                <h3>Precisión</h3>
                <p>Cero errores en la entrada y salida de mercancía.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-bolt"></i>
                <h3>Velocidad</h3>
                <p>Interfaz optimizada para acciones rápidas de CRUD.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-sync"></i>
                <h3>Evolución</h3>
                <p>Crecemos contigo hacia el enrutamiento inteligente.</p>
            </div>
            <div class="value-item">
                <i class="fas fa-laptop-code"></i>
                <h3>Web-Ready</h3>
                <p>Accede y gestiona desde cualquier navegador.</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2026 LogiPlanner - Potenciando tu gestión de inventario.</p>
    </footer>

</body>
</html>