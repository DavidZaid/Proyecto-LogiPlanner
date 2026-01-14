<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogiPlanner | Inventario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2a087a;
            --accent-color: #00d1d1;
            --bg-body: #f4f7fe;
            --text-dark: #333;
            --white: #ffffff;
            --danger: #ff4d4d;
            --warning: #ffbe0b;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg-body);
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- HEADER --- */
        header {
            background: var(--primary-color);
            color: white;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav__titulo { margin: 0; font-size: 1.8rem; font-weight: 900; letter-spacing: -1px; }

        /* --- MENÚ --- */
        .menu { background: var(--white); padding: 10px 5%; border-bottom: 1px solid #ddd; }
        .menu-items { list-style: none; padding: 0; margin: 0; display: flex; gap: 20px; }
        .menu-items li a { 
            text-decoration: none; color: #666; font-weight: 600; padding: 8px 15px; 
            border-radius: 8px; transition: 0.3s; display: flex; align-items: center; gap: 8px;
        }
        .menu-items li a:hover, .menu-items li a.active { background: rgba(42, 8, 122, 0.1); color: var(--primary-color); }

        /* --- TABLA PROFESIONAL --- */
        main { padding: 40px 5%; }
        .table-container {
            background: var(--white);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow-x: auto;
        }

        h2 { color: var(--primary-color); margin-bottom: 25px; display: flex; align-items: center; gap: 10px; }

        table { width: 100%; border-collapse: collapse; min-width: 800px; }
        
        thead tr { background: #f8f9fa; border-bottom: 2px solid #eee; }
        
        th { padding: 15px; text-align: left; color: #555; font-weight: 700; text-transform: uppercase; font-size: 0.85rem; }
        
        td { padding: 15px; border-bottom: 1px solid #f0f0f0; color: #444; vertical-align: middle; }

        tr:hover { background-color: #fcfdff; }

        /* --- BADGES Y BOTONES --- */
        .badge-cantidad {
            background: #e0fbfc;
            color: var(--primary-color);
            padding: 5px 12px;
            border-radius: 15px;
            font-weight: 700;
        }

        .btn-action {
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: 0.3s;
        }

        .btn-edit { background: rgba(255, 190, 11, 0.15); color: #d4a017; margin-right: 5px; }
        .btn-edit:hover { background: var(--warning); color: #fff; }

        .btn-delete { background: rgba(255, 77, 77, 0.15); color: var(--danger); }
        .btn-delete:hover { background: var(--danger); color: #fff; }

        .price-tag { font-weight: 800; color: #2ecc71; }
    </style>
</head>
<body>

    <header>
        <h1 class="nav__titulo">LogiPlanner</h1>
        <div><i class="fas fa-boxes"></i> Gestión de Stock</div>
    </header>

    <nav class="menu">
        <ul class="menu-items">
            <li><a href="./inventario.php" class="active"><i class="fas fa-list"></i> Inventario</a></li>
            <li><a href="./home.php"><i class="fas fa-plus"></i> Agregar Producto</a></li>
            <li><a href="reportes.php"><i class="fas fa-chart-line"></i> Reportes</a></li>
            <li><a href="logout.php" style="color: var(--danger);"><i class="fas fa-power-off"></i> Salir</a></li>
        </ul>
    </nav>

    <main>
        <div class="table-container">
            <h2><i class="fas fa-warehouse" style="color: var(--accent-color);"></i> Inventario de Productos</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio Unit.</th>
                        <th>Fecha Ingreso</th>
                        <th style="text-align: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $host = "localhost";
                    $dbname = "inventario_db";
                    $username = "root";
                    $password = "";

                    $conn = new mysqli($host, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Error de conexión");
                    }

                    $sql = "SELECT * FROM productos ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>#{$row['id']}</td>
                                    <td style='font-weight:600;'>{$row['nombre']}</td>
                                    <td style='color:#777; font-size:0.9rem;'>{$row['descripcion']}</td>
                                    <td><span class='badge-cantidad'>{$row['cantidad']} uds</span></td>
                                    <td><span class='price-tag'>$" . number_format($row['price'] ?? $row['precio'], 2) . "</span></td>
                                    <td>" . date('d/m/Y', strtotime($row['fecha_ingreso'])) . "</td>
                                    <td style='text-align: center;'>
                                        <a href='editar_producto.php?id={$row['id']}' class='btn-action btn-edit'>
                                            <i class='fas fa-edit'></i>
                                        </a>
                                        <a href='eliminar_producto.php?id={$row['id']}' class='btn-action btn-delete' onclick='return confirm(\"¿Estás seguro de eliminar este producto?\")'>
                                            <i class='fas fa-trash'></i>
                                        </a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' style='text-align:center; padding:50px;'>No hay productos registrados.</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>