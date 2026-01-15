<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Contacto | LogiPlanner</title>
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

        /* 1. CORRECCIÓN GLOBAL DE ESPACIOS BLANCOS */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            overflow-x: hidden;
            width: 100%;
            background-color: var(--bg-light);
            font-family: 'Segoe UI', sans-serif;
            color: #333;
        }

        /* --- NAVEGACIÓN --- */
        .nav-container {
            background: linear-gradient(180deg, #370a8ae0 0%, var(--primary-color) 100%);
            padding: 10px 0;
            position: relative;
            z-index: 1000;
            width: 100%;
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
            z-index: 1010;
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
            z-index: 1010;
        }

        /* --- SECCIÓN CONTACTO --- */
        .contact-container {
            max-width: 1100px;
            margin: 60px auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 40px;
        }

        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        }

        .contact-form h2 { color: var(--primary-color); margin-bottom: 25px; }

        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #555; }
        
        .input-group input, .input-group textarea, .input-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #eee;
            border-radius: 12px;
            outline: none;
            font-family: inherit;
        }

        .btn-submit {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }

        .contact-info {
            background: var(--primary-color);
            color: white;
            padding: 40px;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .info-item { display: flex; align-items: center; margin-bottom: 30px; }
        .info-item i { 
            font-size: 1.5rem; 
            background: rgba(255,255,255,0.1); 
            padding: 15px; 
            border-radius: 50%; 
            margin-right: 20px;
            color: var(--accent-color);
        }

        .footer { background: #0a0a0a; color: white; padding: 40px 5%; text-align: center; }

        /* --- RESPONSIVE OPTIMIZADO PARA COINCIDIR CON LA IMAGEN --- */
        @media (max-width: 992px) {
            .nav__btn-hamburguesa { display: block; }
            .nav { height: 80px; }
            .nav__titulo { position: relative; left: 0; font-size: 1.8rem; }

            .nav__link--menu { 
                display: none; 
                flex-direction: column;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: var(--primary-color);
                border-radius: 0;
                padding-top: 100px;
                border: none;
                backdrop-filter: none;
                z-index: 1005;
            }

            .nav__link--menu.is-active { display: flex; }
            .nav__link--menu li { width: 100%; text-align: center; margin: 10px 0; }
            .nav__links { display: inline-block; font-size: 1.2rem; }

            /* AJUSTE PARA QUE EL BOTÓN QUEDE COMO EN LA IMAGEN */
            .nav__link--menu li:last-child a {
                background: var(--accent-color) !important;
                color: var(--primary-color) !important;
                margin: 20px auto !important; /* Más espacio arriba/abajo */
                border-radius: 15px !important; /* Bordes redondeados como la captura */
                width: 85% !important; /* Ocupa casi todo el ancho */
                display: block;
                font-weight: 800;
                padding: 15px 0; /* Más alto para que se vea como botón real */
            }
            
            .contact-container { grid-template-columns: 1fr; margin-top: 30px; }
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
                <li><a href="login.php" class="nav__links">Login</a></li>
            </ul>
        </nav>
    </div>

    <div class="contact-container">
        <div class="contact-form">
            <h2>Envíanos un mensaje</h2>
            <form action="#">
                <div class="input-group">
                    <label>Nombre Completo</label>
                    <input type="text" placeholder="Ej. Juan Pérez" required>
                </div>
                <div class="input-group">
                    <label>Correo Electrónico</label>
                    <input type="email" placeholder="correo@ejemplo.com" required>
                </div>
                <div class="input-group">
                    <label>Asunto</label>
                    <select required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option>Soporte Técnico de Inventarios</option>
                        <option>Información sobre Enrutamiento</option>
                        <option>Ventas / Planes</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="input-group">
                    <label>Mensaje</label>
                    <textarea rows="5" placeholder="¿En qué podemos ayudarte?" required></textarea>
                </div>
                <button type="submit" class="btn-submit">Enviar Mensaje</button>
            </form>
        </div>

        <div class="contact-info">
            <h2>Información de Contacto</h2>
            <p style="margin-bottom: 40px; opacity: 0.9;">¿Tienes dudas sobre cómo gestionar tu stock? Nuestro equipo está listo para ayudarte.</p>
            
            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <h4>Email</h4>
                    <p>soporte@logiplanner.com</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-phone-alt"></i>
                <div>
                    <h4>Teléfono</h4>
                    <p>+57 300 123 4567</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h4>Oficinas</h4>
                    <p>Bogotá, Colombia</p>
                </div>
            </div>

            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>

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
            
            if (navLinks.classList.contains('is-active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        });
    </script>
</body>
</html>