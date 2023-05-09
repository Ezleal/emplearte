$(document).ready(function() {
    $('#login-form').submit(function(event) {
      event.preventDefault(); // Evita que se envíe el formulario
  
      var email = $('input[name="email"]').val();
      var password = $('input[name="password"]').val();
  
      // Validación de correo electrónico
      if (!/\S+@\S+\.\S+/.test(email)) {
        alert('Por favor, ingrese un correo electrónico válido');
        return;
      }
  
      // Validación de contraseña
      if (password.length < 6) {
        alert('Por favor, ingrese una contraseña de al menos 6 caracteres');
        return;
      }
  
      // Envía el formulario si todas las validaciones pasan
      $.ajax({
        type: 'POST',
        url: $('#login-form').attr('action'),
        data: $('#login-form').serialize(),
        success: function(response) {
          // Maneja la respuesta del servidor
        },
        error: function() {
          alert('Se produjo un error al intentar iniciar sesión');
        }
      });
    });
  });
  