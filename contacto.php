<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background-color: var(--bg-light);
            color: #333;
        }

        /* --- NAVEGACIÓN (CENTRADA) --- */
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

        /* --- SECCIÓN CONTACTO --- */
        .contact-container {
            max-width: 1100px;
            margin: 60px auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 40px;
        }

        /* Formulario */
        .contact-form {
            background: white;
            padding: 40px;
            border-radius: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        }

        .contact-form h2 { color: var(--primary-color); margin-bottom: 25px; }

        .input-group { margin-bottom: 20px; text-align: left; }
        .input-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #555; }
        
        .input-group input, .input-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #eee;
            border-radius: 12px;
            outline: none;
            transition: 0.3s;
            box-sizing: border-box;
        }

        .input-group input:focus, .input-group textarea:focus {
            border-color: var(--accent-color);
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

        .btn-submit:hover { background: var(--accent-color); transform: translateY(-3px); }

        /* Info de contacto */
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

        .info-item h4 { margin: 0; font-size: 1.1rem; }
        .info-item p { margin: 5px 0 0; opacity: 0.8; }

        .social-links { margin-top: 20px; display: flex; gap: 15px; }
        .social-links a { color: white; font-size: 1.5rem; transition: 0.3s; }
        .social-links a:hover { color: var(--accent-color); }

        /* --- FOOTER --- */
        .footer { background: #0a0a0a; color: white; padding: 40px 5%; text-align: center; margin-top: 50px; }

        @media (max-width: 850px) {
            .contact-container { grid-template-columns: 1fr; }
            .nav { height: auto; padding: 20px; flex-direction: column; }
            .nav__titulo { position: static; margin-bottom: 20px; }
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
                    <select style="width: 100%; padding: 12px; border: 2px solid #eee; border-radius: 12px;">
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

</body>
</html>