function validarFormulario() {
    // Obtener los valores de los campos
    const nombre = document.getElementById("nombre").value;
    const apellido = document.getElementById("apellido").value;
    const empresa = document.getElementById("empresa").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const telefono = document.getElementById("telefono").value;
    const ciudad = document.getElementById("ciudad").value;

    // Validaciones
    const errores = [];
    if (!nombre) {
        errores.push("El nombre es obligatorio.");
    }
    if (!apellido) {
        errores.push("El apellido es obligatorio.");
    }

    if (!email) {
        errores.push("El email es obligatorio.");
    }
    if (!password) {
        errores.push("La contraseña es obligatoria.");
    }
    // ... (otras validaciones, por ejemplo, para el email, la contraseña, etc.)

    // Mostrar mensajes de error
    const mensajeError = document.getElementById("mensajeError");
    mensajeError.innerHTML = errores.join("<br>");

    return errores.length === 0;
}

// Escuchador de eventos para el envío del formulario
document.getElementById("registroForm").addEventListener("submit", function(event) {
    event.preventDefault();
    if (validarFormulario()) {
        // Enviar los datos al servidor mediante AJAX (opcional)
        // ...
    }
    function redirectToLogin() {
        window.location.href = "../LogiPlanner/login.php";
    }
});