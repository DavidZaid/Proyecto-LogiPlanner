<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña | LogiPlanner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2a087a;
            --accent-color: #00d1d1;
            --bg-body: #f4f7fe;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg-body);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .recovery-container {
            background: var(--white);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            text-align: center;
        }

        .logo-text {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
        }

        h2 {
            color: #444;
            font-size: 1.2rem;
            margin-bottom: 25px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #666;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #eee;
            border-radius: 10px;
            font-size: 1rem;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input:focus {
            outline: none;
            border-color: var(--accent-color);
            background: #f0ffff;
        }

        .btn-recover {
            width: 100%;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 15px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-recover:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 209, 209, 0.3);
        }

        .back-to-login {
            margin-top: 20px;
            display: block;
            color: #888;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .back-to-login:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>

    <div class="recovery-container">
        <a href="index.php" class="logo-text">LogiPlanner</a>
        <h2>Recuperar acceso</h2>
        
        <p style="color: #777; font-size: 0.9rem; margin-bottom: 30px;">
            Ingresa tu correo electrónico y te enviaremos instrucciones para restablecer tu contraseña.
        </p>

        <form action="procesar_recuperacion.php" method="POST">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
            </div>

            <button type="submit" class="btn-recover">
                Enviar instrucciones
            </button>
        </form>

        <a href="login.php" class="back-to-login">
            <i class="fas fa-arrow-left"></i> Volver al Inicio de Sesión
        </a>
    </div>

</body>
</html>