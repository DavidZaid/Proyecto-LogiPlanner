// Get references to the form elements
const emailInput = document.querySelector('input[type="email"]');
const passwordInput = document.querySelector('input[type="password"]');
const form = document.querySelector('form');

// Function to display a validation error message
function showErrorMessage(message) {
  alert(message); // You can replace this with a more user-friendly error message display
}

// Add event listener to the form submission
form.addEventListener('submit', function(event) {
  // Prevent default form submission behavior
  event.preventDefault();

  // Check if email is empty
  if (emailInput.value === '') {
    showErrorMessage('Por favor, ingresa tu correo electrónico.');
    return; // Exit the function if there's an error
  }

  // Check if email is valid format (basic check)
  const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!emailRegex.test(emailInput.value)) {
    showErrorMessage('Por favor, ingresa un correo electrónico válido.');
    return;
  }

  // Check if password is empty
  if (passwordInput.value === '') {
    showErrorMessage('Por favor, ingresa tu contraseña.');
    return;
  }

  // Minimum password length check (optional)
  const minPasswordLength = 6;
  if (passwordInput.value.length < minPasswordLength) {
    showErrorMessage(`La contraseña debe tener al menos ${minPasswordLength} caracteres.`);
    return;
  }

  // Assuming you have a login logic (e.g., sending data to server), uncomment these lines:
  // Submit the form data (replace with your actual login logic)
  // console.log('Email:', emailInput.value);
  // console.log('Password:', passwordInput.value);

  // Alternatively, you can redirect to another page after successful validation

  // ... your login logic goes here
});
