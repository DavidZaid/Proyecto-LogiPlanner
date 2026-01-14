<?php
$host = "localhost";
$dbname = "login_register"; // Tu base de datos según la imagen
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];

    if ($npass === $cpass) {
        // --- ESTA ES LA PARTE CLAVE ---
        // Esto convierte 'smr_21' en algo como '$2y$10$...'
        $hashed_password = password_hash($npass, PASSWORD_BCRYPT);
        
        $sql = "UPDATE usuarios SET password = '$hashed_password' WHERE email = '$email'";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Contraseña actualizada con éxito en formato seguro. Ya puedes iniciar sesión.'); window.location='login.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "<script>alert('Las contraseñas no coinciden'); window.history.back();</script>";
    }
}
$conn->close();
?>