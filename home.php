<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogiPlanner | Agregar Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2a087a;
            --accent-color: #00d1d1;
            --bg-body: #f4f7fe;
            --text-dark: #333;
            --white: #ffffff;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg-body);
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- HEADER ESTILO DASHBOARD --- */
        header {
            background: var(--primary-color);
            color: white;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .nav__titulo {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 900;
            letter-spacing: -1px;
        }

        /* --- MENÚ DE NAVEGACIÓN --- */
        .menu {
            background: var(--white);
            padding: 10px 5%;
            border-bottom: 1px solid #ddd;
        }

        .menu-items {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .menu-items li a {
            text-decoration: none;
            color: #666;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 8px;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .menu-items li a:hover, .menu-items li a.active {
            background: rgba(42, 8, 122, 0.1);
            color: var(--primary-color);
        }

        .logout-btn {
            color: #ff4d4d !important;
        }

        /* --- CONTENEDOR PRINCIPAL --- */
        main {
            flex: 1;
            padding: 40px 5%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            background: var(--white);
            width: 100%;
            max-width: 600px;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        }

        h2 {
            color: var(--primary-color);
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 1.8rem;
            text-align: center;
        }

        /* --- ESTILO DEL FORMULARIO --- */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #eee;
            border-radius: 10px;
            font-size: 1rem;
            box-sizing: border-box; /* Importante para que no se salga del contenedor */
            transition: 0.3s;
            font-family: inherit;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--accent-color);
            background: #f0ffff;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .btn-submit {
            width: 100%;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 209, 209, 0.3);
        }

        /* Responsivo */
        @media (max-width: 600px) {
            .menu-items { flex-wrap: wrap; gap: 10px; }
            .form-container { padding: 25px; }
        }
    </style>
</head>
<body>

    <header>
        <h1 class="nav__titulo">LogiPlanner</h1>
        <div class="user-info">
            <i class="fas fa-user-circle"></i> Panel de Control
        </div>
    </header>

    <nav class="menu">
        <ul class="menu-items">
            <li><a href="./inventario.php"><i class="fas fa-boxes"></i> Inventario</a></li>
            <li><a href="./home.php" class="active"><i class="fas fa-plus-circle"></i> Agregar Producto</a></li>
            <li><a href="reportes.php"><i class="fas fa-chart-line"></i> Reportes</a></li>
            <li><a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
        </ul>
    </nav>

    <main>
        <div class="form-container">
            <h2><i class="fas fa-box-open" style="color: var(--accent-color);"></i> Nuevo Producto</h2>
            
            <form action="agregar_producto.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ej. Neumáticos X-200" required>
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Detalles del producto..."></textarea>
                </div>

                <div style="display: flex; gap: 20px;">
                    <div class="form-group" style="flex: 1;">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" id="cantidad" name="cantidad" placeholder="0" required>
                    </div>

                    <div class="form-group" style="flex: 1;">
                        <label for="precio">Precio ($)</label>
                        <input type="number" step="0.01" id="precio" name="precio" placeholder="0.00">
                    </div>
                </div>

                <div class="form-group">
                    <label for="fecha_ingreso">Fecha de Ingreso</label>
                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Guardar en Inventario
                </button>
            </form>
        </div>
    </main>

</body>
</html>