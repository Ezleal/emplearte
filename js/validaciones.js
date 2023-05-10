$(document).ready(function() {
    $('#register-form').submit(function(event) {
      event.preventDefault(); // Evita que se envíe el formulario
  
      var email = $('input[name="email"]').val();
      var password = $('input[name="password"]').val();
      var nombre = $('input[name="nombre"]').val();
      var apellido = $('input[name="apellido"]').val();
      var username = $('input[name="username"]').val();

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

      $(this).unbind('submit').submit(); // Si no hay errores, enviar el formulario


    });
  });
  