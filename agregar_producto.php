<?php
// 1. Configuración de la conexión
$host = "localhost";
$dbname = "inventario_db";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// 2. Recibir los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $fecha_ingreso = $_POST['fecha_ingreso'];

    // 3. Insertar en la base de datos
    // Asegúrate de que los nombres de las columnas coincidan con tu tabla
    $sql = "INSERT INTO productos (nombre, descripcion, cantidad, precio, fecha_ingreso) 
            VALUES ('$nombre', '$descripcion', $cantidad, $precio, '$fecha_ingreso')";

    if ($conn->query($sql) === TRUE) {
        // Si tiene éxito, regresa al inventario para ver el producto nuevo
        header("Location: inventario.php");
    } else {
        echo "Error al guardar: " . $conn->error;
    }
}

$conn->close();
?>