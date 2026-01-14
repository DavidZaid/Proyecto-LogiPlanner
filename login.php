<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit();
}

$error = '';
$email_value = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $email_value = htmlspecialchars($email);

    if (!$email || !$password) {
        $error = "Ambos campos son requeridos.";
    } else {
        $conn = new mysqli("localhost", "root", "", "login_register");
        if ($conn->connect_error) {
            $error = "Error de conexión.";
        } else {
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows === 1) {
                $user = $res->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    header("Location: home.php");
                    exit();
                } else {
                    $error = "Contraseña incorrecta.";
                }
            } else {
                $error = "Correo no registrado.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login | LogiPlanner</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, sans-serif;
}

body{
    background:#f2f4f8;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:15px;
}

/* CONTENEDOR GENERAL */
.login-wrapper{
    width:100%;
    max-width:1000px;
    background:#fff;
    border-radius:15px;
    display:flex;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    min-height:550px;
}

/* LADO FORM */
.login-left{
    flex:1;
    padding:30px 40px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

/* GIF SUPERIOR */
.login-gif{
    display:flex;
    justify-content:center;
    margin-bottom:15px;
}

.login-gif img{
    width:150px;
    height:auto;
}

/* TITULO */
.login-left h1{
    text-align:center;
    font-size:24px;
    margin-bottom:20px;
    color:#333;
}

/* INPUTS */
input{
    width:100%;
    padding:13px 15px;
    margin-bottom:10px;
    border:1.5px solid #ddd;
    border-radius:8px;
    font-size:15px;
}

input:focus{
    outline:none;
    border-color:#2575fc;
    box-shadow:0 0 0 2px rgba(37, 117, 252, 0.1);
}

/* CHECK */
.remember{
    display:flex;
    align-items:center;
    font-size:14px;
    color:#555;
    margin:15px 0 20px;
}

.remember input{
    width:auto;
    margin-right:8px;
    margin-bottom:0;
}

/* BOTON */
button{
    width:100%;
    padding:14px;
    background:#00897b;
    color:white;
    border:none;
    border-radius:8px;
    font-size:16px;
    cursor:pointer;
    font-weight:600;
    transition:background 0.2s;
}

button:hover{
    background:#00796b;
}

/* LINKS */
.links{
    margin-top:20px;
    text-align:center;
    font-size:14px;
}

.links p{
    margin:8px 0;
}

.links a{
    color:#2575fc;
    text-decoration:none;
    font-weight:500;
}

.links a:hover{
    text-decoration:underline;
}

/* MENSAJES */
.error{
    background:#fdecea;
    color:#c62828;
    padding:12px;
    border-radius:6px;
    margin-bottom:15px;
    text-align:center;
    font-size:14px;
    border-left:4px solid #c62828;
}

/* LADO DERECHO - IMAGEN MEJORADA */
.login-right{
    flex:1;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display:flex;
    align-items:center;
    justify-content:center;
    padding:0;
    position:relative;
    overflow:hidden;
}

.login-right::before {
    content:'';
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background:rgba(0,0,0,0.05);
    z-index:1;
}

.login-right img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    position:relative;
    z-index:2;
    transition:transform 0.5s ease;
}

/* Efecto sutil al cargar */
@keyframes fadeInImage {
    from { opacity: 0.8; }
    to { opacity: 1; }
}

.login-right img.loaded {
    animation: fadeInImage 0.8s ease;
}

/* RESPONSIVE */
@media(max-width:900px){
    .login-wrapper{
        flex-direction:column;
        max-width:450px;
    }
    
    .login-left{
        padding:25px 30px;
    }
    
    .login-right{
        height:220px;
        min-height:220px;
    }
    
    .login-right img{
        object-fit:cover;
    }
}

@media(max-width:480px){
    .login-left{
        padding:20px 25px;
    }
    
    .login-left h1{
        font-size:22px;
        margin-bottom:15px;
    }
    
    .login-gif img{
        width:60px;
    }
    
    input{
        padding:12px 14px;
        margin-bottom:8px;
    }
    
    button{
        padding:13px;
        font-size:15px;
    }
    
    .login-right{
        height:180px;
        min-height:180px;
    }
}
</style>
</head>

<body>

<div class="login-wrapper">

    <!-- IZQUIERDA -->
    <div class="login-left">

        <!-- GIF PEQUEÑO ARRIBA -->
        <div class="login-gif">
            <img src="imagenes/loading.gif" alt="Animación">
        </div>

        <h1>Ingrese a su cuenta</h1>

        <?php if($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" value="<?= $email_value ?>" required>
            <input type="password" name="password" placeholder="Contraseña" required>

            <div class="remember">
                <input type="checkbox">
                Recordar contraseña
            </div>

            <button type="submit">Acceder</button>
        </form>

        <div class="links">
            <p>¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
           <p><a href="olvide_password.php">Olvidé mi contraseña</a></p>
        </div>

    </div>

    <!-- DERECHA - IMAGEN MEJORADA -->
    <div class="login-right">
        <img src="./imagenes/fondo.png" alt="Imagen principal" id="main-image">
    </div>

</div>

<script>
// Enfocar automáticamente el campo de email
document.addEventListener('DOMContentLoaded', function() {
    const emailField = document.querySelector('input[name="email"]');
    if (emailField && !emailField.value) {
        emailField.focus();
    }
    
    // Mejorar experiencia de imagen
    const mainImage = document.getElementById('main-image');
    if (mainImage) {
        // Agregar clase cuando la imagen se carga
        mainImage.addEventListener('load', function() {
            this.classList.add('loaded');
        });
        
        // Forzar carga si ya está en cache
        if (mainImage.complete) {
            mainImage.classList.add('loaded');
        }
    }
});
</script>

</body>
</html>