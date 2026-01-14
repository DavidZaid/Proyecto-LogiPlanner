<?php
$host = "localhost";
$dbname = "inventario_db";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

// 1. Resumen: Total de productos y Valor monetario total
$resumen = $conn->query("SELECT COUNT(*) as total_items, SUM(IFNULL(cantidad, 0) * IFNULL(precio, 0)) as valor_total FROM productos");
$datos_resumen = $resumen->fetch_assoc();

// 2. Stock Crítico: Productos que tienen entre 1 y 5 unidades (Alertas reales)
$bajo_stock = $conn->query("SELECT COUNT(*) as alertas FROM productos WHERE cantidad > 0 AND cantidad <= 5");
$datos_alerta = $bajo_stock->fetch_assoc();

// 3. Datos para las gráficas (Top 10 productos)
$productos_query = $conn->query("SELECT nombre, cantidad, (cantidad * precio) as valor_monetario FROM productos ORDER BY cantidad DESC LIMIT 10");
$nombres = [];
$cantidades = [];
$valores = [];

while($row = $productos_query->fetch_assoc()){
    $nombres[] = $row['nombre'];
    $cantidades[] = $row['cantidad'];
    $valores[] = $row['valor_monetario'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LogiPlanner | Reportes Inteligentes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --primary-color: #2a087a; --accent-color: #00d1d1; --bg-body: #f4f7fe; }
        body { font-family: 'Segoe UI', sans-serif; background-color: var(--bg-body); margin: 0; }
        
        header { background: var(--primary-color); color: white; padding: 15px 5%; display: flex; justify-content: space-between; align-items: center; }
        .menu { background: white; padding: 10px 5%; border-bottom: 1px solid #ddd; display: flex; gap: 20px; }
        .menu a { text-decoration: none; color: #666; font-weight: 600; padding: 8px 15px; border-radius: 8px; transition: 0.3s; }
        .menu a:hover { background: rgba(42, 8, 122, 0.05); }
        .menu a.active { background: rgba(42, 8, 122, 0.1); color: var(--primary-color); }

        main { padding: 40px 5%; }
        
        .stats-container { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 40px; }
        .stat-card { background: white; padding: 25px; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); display: flex; align-items: center; gap: 20px; }
        .stat-icon { width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }
        
        .charts-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        .chart-card { background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }

        @media (max-width: 900px) { .charts-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>

<header>
    <h1 style="margin:0; font-size:1.8rem;">LogiPlanner</h1>
    <span><i class="fas fa-chart-pie"></i> Análisis de Datos</span>
</header>

<nav class="menu">
    <a href="./inventario.php">Inventario</a>
    <a href="./home.php">Agregar Producto</a>
    <a href="./reportes.php" class="active">Reportes</a>
    <a href="./logout.php" style="color:#ff4d4d;">Salir</a>
</nav>

<main>
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon" style="background: #eef2ff; color: #4338ca;"><i class="fas fa-boxes"></i></div>
            <div>
                <small style="color:#888;">Total Productos</small>
                <h3 style="margin:0; font-size:1.5rem;"><?php echo $datos_resumen['total_items']; ?></h3>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: #ecfdf5; color: #059669;"><i class="fas fa-dollar-sign"></i></div>
            <div>
                <small style="color:#888;">Valor de Inventario</small>
                <h3 style="margin:0; font-size:1.5rem;">$<?php echo number_format($datos_resumen['valor_total'], 2); ?></h3>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background: #fff1f2; color: #e11d48;"><i class="fas fa-exclamation-triangle"></i></div>
            <div>
                <small style="color:#888;">Stock Crítico (1 a 5)</small>
                <h3 style="margin:0; font-size:1.5rem; color: <?php echo ($datos_alerta['alertas'] > 0) ? '#e11d48' : '#333'; ?>;">
                    <?php echo $datos_alerta['alertas']; ?>
                </h3>
            </div>
        </div>
    </div>

    <div class="charts-grid">
        <div class="chart-card">
            <h3 style="color:var(--primary-color); margin-top:0;">Distribución de Unidades</h3>
            <canvas id="chartStock"></canvas>
        </div>
        <div class="chart-card">
            <h3 style="color:var(--primary-color); margin-top:0;">Inversión por Producto ($)</h3>
            <canvas id="chartValor"></canvas>
        </div>
    </div>
</main>

<script>
    // Gráfica de Barras (Stock)
    const ctxStock = document.getElementById('chartStock').getContext('2d');
    new Chart(ctxStock, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($nombres); ?>,
            datasets: [{
                label: 'Unidades',
                data: <?php echo json_encode($cantidades); ?>,
                backgroundColor: 'rgba(0, 209, 209, 0.6)',
                borderColor: '#00d1d1',
                borderWidth: 2,
                borderRadius: 8
            }]
        },
        options: { 
            responsive: true, 
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // Gráfica de Dona (Valor Monetario)
    const ctxValor = document.getElementById('chartValor').getContext('2d');
    new Chart(ctxValor, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($nombres); ?>,
            datasets: [{
                data: <?php echo json_encode($valores); ?>,
                backgroundColor: ['#2a087a', '#00d1d1', '#4338ca', '#059669', '#f59e0b', '#e11d48', '#6366f1', '#a855f7'],
                hoverOffset: 15
            }]
        },
        options: { responsive: true }
    });
</script>

</body>
</html>