const form = document.getElementById('registroForm');
const mensaje = document.getElementById('mensaje');

form.addEventListener('submit', (event) => {
  event.preventDefault();

  // Obtener los valores de los campos
  const nombre = document.getElementById('nombre').value;
  const apellido = document.getElementById('apellido').value;
  const empresa = document.getElementById('empresa').value;
  const email = document.getElementById('email').value;
  const telefono = document.getElementById('telefono').value;
  const ciudad = document.getElementById('ciudad').value;

  // Validación básica
  if (nombre === '' || apellido === '' || email === '') {
    mensaje.textContent = 'Por favor, complete todos los campos obligatorios.';
    return;
  }

  // Aquí puedes agregar más validaciones, como verificar el formato del correo electrónico

  // Enviar los datos a un servidor (ejemplo con fetch)
  fetch('tu_endpoint_de_servidor', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre,
      apellido,
      empresa,
      email,
      telefono,
      ciudad
    })
  })
  .then(response => response.json())
  .then(data => {
    mensaje.textContent = data.mensaje; // Mostrar un mensaje de éxito o error
  })
  .catch(error => {
    console.error('Error:', error);
    mensaje.textContent = 'Error al enviar los datos.';
  });
  fetch('http://tu_dominio:3000/guardar-datos', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      nombre,
      apellido,
      email
    })
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
  })
  .catch(error => {
    console.error('Error:', error);
  });
  

});
