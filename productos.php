<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | LogiPlanner</title>
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

        /* --- HEADER Y NAVEGACIÓN (IGUAL A NOSOTROS) --- */
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

        .nav__btn-hamburguesa {
            display: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            position: absolute;
            right: 20px;
            z-index: 100;
        }

        /* --- SECCIÓN PRODUCTOS --- */
        .products-hero {
            padding: 80px 5% 40px;
            text-align: center;
            background: white;
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
        }

        .products-hero h1 {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 800;
        }

        .products-hero p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 40px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 40px auto 80px;
            padding: 0 5%;
        }

        .product-card {
            background: white;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: 0.4s;
            position: relative;
            overflow: hidden;
            border: 1px solid #f0f0f0;
            text-align: center;
        }

        .product-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .product-card i { font-size: 3.5rem; color: var(--accent-color); margin-bottom: 25px; }
        .product-card h3 { color: var(--primary-color); font-size: 1.8rem; margin-bottom: 15px; }

        .badge-soon {
            position: absolute;
            top: 20px;
            right: -35px;
            background: #ffb800;
            color: #000;
            padding: 5px 40px;
            font-size: 0.8rem;
            font-weight: 700;
            transform: rotate(45deg);
        }

        .feature-list { list-style: none; padding: 0; text-align: left; margin-top: 20px; }
        .feature-list li { margin-bottom: 12px; display: flex; align-items: center; font-size: 1rem; color: #555; }
        .feature-list li i { font-size: 1.2rem; color: #2ecc71; margin-right: 10px; margin-bottom: 0; }

        .footer { background: #0a0a0a; color: white; padding: 60px 5%; text-align: center; }

        /* --- RESPONSIVE OPTIMIZADO (IGUAL A NOSOTROS) --- */
        @media (max-width: 992px) {
            .nav__btn-hamburguesa { display: block; }
            .nav { height: 80px; justify-content: space-between; padding: 0 20px; }
            .nav__titulo { position: static; font-size: 1.8rem; margin-bottom: 0; }

            .nav__link--menu { 
                display: none; 
                flex-direction: column;
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background: #2a087a;
                border-radius: 0;
                padding: 30px 0;
                border: none;
                backdrop-filter: none;
                gap: 0;
            }

            .nav__link--menu.is-active { display: flex; box-shadow: 0 10px 20px rgba(0,0,0,0.2); }
            .nav__link--menu li { width: 100%; text-align: center; }
            .nav__links { display: block; width: 100%; padding: 15px 0; font-size: 1.1rem; }

            .nav__link--menu li:last-child a {
                background: var(--accent-color) !important;
                color: var(--primary-color) !important;
                margin: 10px auto !important;
                border-radius: 10px !important; /* Mantiene la cápsula */
                width: 80%;
                
            }
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

    <header class="products-hero">
        <h1>Nuestras Soluciones</h1>
        <p>Herramientas diseñadas para el control absoluto de tu logística.</p>
    </header>

    <section class="products-grid">
        <div class="product-card">
            <i class="fas fa-cubes"></i>
            <h3>Gestión de Inventario</h3>
            <p>Módulo centralizado para el control total de existencias en bodega.</p>
            <ul class="feature-list">
                <li><i class="fas fa-check"></i> Registro de nuevos productos.</li>
                <li><i class="fas fa-check"></i> Edición de stock en tiempo real.</li>
                <li><i class="fas fa-check"></i> Eliminación y depuración.</li>
            </ul>
        </div>

        <div class="product-card">
            <div class="badge-soon">ROADMAP</div>
            <i class="fas fa-route" style="color: #aaa;"></i>
            <h3 style="color: #666;">Sistema de Enrutamiento</h3>
            <p>Optimizamos el viaje de tus productos desde el almacén hasta el cliente final.</p>
            <ul class="feature-list" style="opacity: 0.6;">
                <li><i class="fas fa-clock"></i> Cálculo de rutas más cortas.</li>
                <li><i class="fas fa-clock"></i> Seguimiento GPS integrado.</li>
            </ul>
        </div>

        <div class="product-card">
            <i class="fas fa-chart-line"></i>
            <h3>Análisis de Datos</h3>
            <p>Visualiza el movimiento de tus productos con métricas claras.</p>
            <ul class="feature-list">
                <li><i class="fas fa-check"></i> Historial de modificaciones.</li>
                <li><i class="fas fa-check"></i> Exportación a PDF/Excel.</li>
            </ul>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2026 LogiPlanner - Innovación que mueve al mundo.</p>
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