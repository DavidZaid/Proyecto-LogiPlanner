<?php
$host = "localhost";
$dbname = "login_register"; // Corregido según tu imagen
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']); 

    // Ahora sí buscará en login_register.usuarios
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        header("Location: cambiar_password.php?email=" . urlencode($email));
        exit();
    } else {
        echo "<script>
                alert('El correo no existe en la base de datos login_register'); 
                window.location='olvide_password.php';
              </script>";
    }
}
$conn->close();
?>