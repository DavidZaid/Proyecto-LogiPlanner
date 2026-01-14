<?php
// Incluimos la conexión que acabas de crear
include 'db.php'; 

try {
    // Intentamos listar las bases de datos para ver si hay respuesta
    $dbs = $client->listDatabases();
    
    echo "<h1>¡Conexión Exitosa!</h1>";
    echo "<p>LogiPlanner está conectado a MongoDB Atlas.</p>";
    echo "<h3>Tus bases de datos actuales:</h3><ul>";
    
    foreach ($dbs as $dbInfo) {
        echo "<li>" . $dbInfo->getName() . "</li>";
    }
    
    echo "</ul>";

} catch (Exception $e) {
    echo "<h1>Error de conexión</h1>";
    echo "<p>Algo salió mal. Revisa tu usuario y contraseña en db.php.</p>";
    echo "<b>Detalle del error:</b> " . $e->getMessage();
}
?>