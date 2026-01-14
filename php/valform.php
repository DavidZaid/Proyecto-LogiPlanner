

<?php
session_start();

// Conectar a la base de datos (asegúrate de cambiar los datos según tu configuración)

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "login_register";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $empresa = $_POST['empresa'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];

    // Validaciones
    $errors = [];

    if (strlen($nombre) < 2) {
        $errors[] = "El nombre debe tener al menos 2 caracteres.";
    }

    if (strlen($apellido) < 2) {
        $errors[] = "El apellido debe tener al menos 2 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El correo electrónico no es válido.";
    }

    if (strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Verificar si el correo ya está registrado
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors[] = "El correo electrónico ya está registrado.";
    }

    // Si no hay errores, guardar en la base de datos
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, empresa, email, password, telefono, ciudad) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nombre, $apellido, $empresa, $email, $hashed_password, $telefono, $ciudad);
        
        if ($stmt->execute()) {
            // Redirigir a la página de inicio de sesión después de un registro exitoso
            header("Location: ../login.php"); // Cambia la ruta si es necesario
            exit(); // Asegúrate de salir después de la redirección
        } else {
            echo "Error al registrar: " . $conn->error;
        }
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }

    $stmt->close();
}
$conn->close();
?>
