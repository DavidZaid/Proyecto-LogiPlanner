document.getElementById("quiemes-somos").addEventListener("click", function(event) {
  event.preventDefault();
window.location.href = "quienes.html"
});

document.getElementById("como-funciona").addEventListener("click", function() {
  window.location.href = "funciona.html";
});

document.getElementById("productos").addEventListener("click", function() {
  window.location.href = "productos.html";
});

document.getElementById("contacto").addEventListener("click", function() {
  window.location.href = "contacto.html";
});

document.getElementById("login").addEventListener("click", function() {
  window.location.href = "login.html";
});

document.getElementById("boton").addEventListener("click", function() {
  window.location.href = "login.html";
});

document.getElementById(" Acceder").addEventListener("click", function() {
  window.location.href = "home.html";
});

document.getElementById(" recuperar").addEventListener("click", function() {
  window.location.href = "home.html";
});

document.getElementById(" registro").addEventListener("click", function() {
  window.location.href = "registro.html";
});
// Get references to all the buttons
const botones = document.querySelectorAll('.nav__links');

// Add event listener to each button
botones.forEach(boton => {
  boton.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    const href = this.getAttribute('href'); // Get the href attribute
    window.location.href = href; // Redirect to the specified URL
  });
});



  
  