<?php
require 'vendor/autoload.php'; 

use MongoDB\Client;
use MongoDB\Driver\ServerApi;

// REEMPLAZA <db_username> y <db_password> con tus datos reales de Mongo Atlas
$uri = 'mongodb+srv://<db_username>:<db_password>@cluster0.b6j5w1p.mongodb.net/?appName=Cluster0';

$apiVersion = new ServerApi(ServerApi::V1);
$client = new Client($uri, [], ['serverApi' => $apiVersion]);

try {
    // Esto crea la base de datos llamada LogiPlanner en tu Atlas
    $database = $client->selectDatabase('LogiPlanner');
    
    // Estas son tus colecciones (como las tablas)
    $usuariosColl = $database->usuarios;
    $productosColl = $database->productos;

} catch (Exception $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>