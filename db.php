<?php
require 'vendor/autoload.php'; 

// IMPORTANTE: Asegúrate de tener estas líneas arriba
use MongoDB\Client;

$uri = 'TU_LINK_DE_MONGODB_ATLAS'; // Usa el que me pasaste antes

try {
    $client = new Client($uri);
    $database = $client->selectDatabase('LogiPlanner');
    $usuariosColl = $database->usuarios;
    
    // Si llegamos aquí, la conexión está lista
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}