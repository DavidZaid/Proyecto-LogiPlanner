<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Contraseña | LogiPlanner</title>
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

        .password-container {
            background: var(--white);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        h2 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #666;
        }

        input[type="password"] {
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

        .btn-save {
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
            margin-top: 10px;
        }

        .btn-save:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
        }

        .info-text {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="password-container">
        <h2>Nueva Contraseña</h2>
        <p class="info-text">Por favor, elige una contraseña segura que no hayas usado antes.</p>

        <form action="actualizar_db_password.php" method="POST">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">

            <div class="form-group">
                <label>Nueva Contraseña</label>
                <input type="password" name="npass" placeholder="Mínimo 8 caracteres" required>
            </div>

            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="cpass" placeholder="Repite tu contraseña" required>
            </div>

            <button type="submit" class="btn-save">
                Actualizar Contraseña
            </button>
        </form>
    </div>

</body>
</html>