// archivo.js

document.addEventListener('DOMContentLoaded', function() {
  var tieneCocheSi = document.getElementById('tiene-coche-si');
  var datosCoche = document.getElementById('datos-coche');

  tieneCocheSi.addEventListener('change', function() {
    if (tieneCocheSi.checked) {
      datosCoche.style.display = 'block';
    } else {
      datosCoche.style.display = 'none';
    }
  });

  var formulario = document.getElementById('registro-formulario');

  formulario.addEventListener('submit', function(event) {
    event.preventDefault();

    // Obtener los valores del formulario
    var tieneCoche = document.querySelector('input[name="tiene-coche"]:checked').value;
    var colorCoche = document.getElementById('color-coche').value;
    var modeloCoche = document.getElementById('modelo-coche').value;
    var placaCoche = document.getElementById('placa-coche').value;

    // Crear un objeto con los datos del formulario
    var datosFormulario = {
      tieneCoche: tieneCoche,
      colorCoche: colorCoche,
      modeloCoche: modeloCoche,
      placaCoche: placaCoche
    };

    // Enviar los datos del formulario a través de una petición AJAX o realizar cualquier otra acción necesaria
    // ...

    // Redirigir a la página de inicio o mostrar un mensaje de éxito
    // ...
  });
});
