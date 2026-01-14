<?php
// Configuración de la base de datos
$host = "localhost";
$dbname = "inventario_db";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar
    $sql = "DELETE FROM productos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirigir al inventario tras eliminar
        header("Location: inventario.php");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}

$conn->close();
?>