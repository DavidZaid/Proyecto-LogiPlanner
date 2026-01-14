<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/registro.css">
    <style>
        /* Agregamos esto aquí directamente para asegurar que funcione mientras arreglas tus archivos */
        body {
            margin: 0;
            padding: 0;
            background-image: url('./imagenes/fondo.png'); /* Verifica que la carpeta imagenes esté junto a este archivo */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.3);
            width: 400px;
            z-index: 1;
        }
        .nav__titulo {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
        }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { 
            width: 100%; 
            padding: 10px; 
            margin-top: 20px; 
            background: #008080; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="nav__titulo">
        <h2>LogiPlanner</h2>
    </div>

    <div class="container">
        <h1>Ingrese sus datos</h1>
        <form id="registroForm" action="php/valform.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="empresa">Nombre de la Empresa:</label>
            <input type="text" id="empresa" name="empresa">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="telefono">Número de Teléfono:</label>
            <input type="tel" id="telefono" name="telefono">

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad">

            <button type="submit">Registrarse</button>
        </form>
    </div>

</body>
</html>