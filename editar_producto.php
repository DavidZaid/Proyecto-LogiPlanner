<?php
$host = "localhost";
$dbname = "inventario_db";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

// 1. Cargar los datos actuales del producto
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}

// 2. Procesar la actualización si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $updateSql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', cantidad=$cantidad, precio=$precio WHERE id=$id";
    
    if ($conn->query($updateSql) === TRUE) {
        header("Location: inventario.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LogiPlanner | Editar Producto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --primary-color: #2a087a; --accent-color: #00d1d1; --bg-body: #f4f7fe; }
        body { font-family: 'Segoe UI', sans-serif; background-color: var(--bg-body); margin: 0; padding: 40px; display: flex; justify-content: center; }
        .form-container { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 500px; }
        h2 { color: var(--primary-color); text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; }
        input, textarea { width: 100%; padding: 12px; border: 2px solid #eee; border-radius: 10px; box-sizing: border-box; }
        .btn-update { width: 100%; background: var(--primary-color); color: white; border: none; padding: 15px; border-radius: 10px; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .btn-cancel { display: block; text-align: center; margin-top: 15px; color: #777; text-decoration: none; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2><i class="fas fa-edit"></i> Editar Producto</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?php echo $product['nombre']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="descripcion"><?php echo $product['descripcion']; ?></textarea>
            </div>

            <div style="display: flex; gap: 10px;">
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" name="cantidad" value="<?php echo $product['cantidad']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input type="number" step="0.01" name="precio" value="<?php echo $product['precio']; ?>">
                </div>
            </div>

            <button type="submit" class="btn-update">Actualizar Cambios</button>
            <a href="inventario.php" class="btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>