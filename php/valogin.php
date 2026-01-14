<?php
// Mostrar todos los errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar la sesión
session_start();

// Definir las variables para la conexión a la base de datos
$servername = "localhost"; // O la dirección de tu servidor de base de datos
$username = "root";  // Reemplaza con tu nombre de usuario de la base de datos
$password = ""; // Reemplaza con tu contraseña de la base de datos
$dbname = "login_register"; // Reemplaza con el nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validaciones
    $errors = [];

    if (empty($email) || empty($password)) {
        $errors[] = "Ambos campos son requeridos.";
    }

    // Buscar el usuario en la base de datos
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['email'];
                // Redirigir a home.php después de un inicio de sesión exitoso
                header("Location: home.php");
                exit();
            } else {
                $errors[] = "Contraseña incorrecta.";
            }
        } else {
            $errors[] = "El correo no está registrado.";
        }
    }

    // Mostrar errores
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
}

// Cerrar la conexión
$conn->close();
?>
