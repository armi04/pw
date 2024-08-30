labels = document.getElementsByClassName("label");
for (let i = 0; i < labels.length; i++) {
  labels[i].addEventListener("click", function () {
    this.classList.toggle("active");
    this.parentElement.classList.toggle("active");
  });
}

var backToTop = document.getElementById('back-to-top');

backToTop.onclick = function(){
  window.scrollTo(0, 0);
}
// Function to add class
function showBackToTop() {
  backToTop.classList.add('show-btt');
}

// Function to remove class
function hideBackToTop() {
  backToTop.classList.remove('show-btt');
}

// Check scroll position and add/remove class
function checkScrollPos() {
  if (window.scrollY >= 300) {
    showBackToTop();
  } else {
    hideBackToTop();
  }
}

// Add event listener to scroll event
window.addEventListener('scroll', function() {
  checkScrollPos();
});

// Check scroll position once when the page loads
checkScrollPos();

var btnIngresos = document.querySelectorAll('#btnIngreso');

btnIngresos.forEach(function(btn) {
  btn.addEventListener('click', function() {
    var codigoAula = this.dataset.text;
    var room = this.dataset.room;
    var grade = this.dataset.grade;
    localStorage.setItem('CODIGO_AULA', codigoAula);
    localStorage.setItem('SALON_CLASE', room);
    localStorage.setItem('GRADO_AULA', grade);
    /*document.documentElement.scrollIntoView({ behavior: 'auto', block: 'start' });*/
    document.querySelector("#btnCargar").click();
  });
});

$(document).ready(function() {
  $("#btnIngreso").click(function() {
    var codigoAula = parseInt(localStorage.getItem("CODIGO_AULA"));
    var salonClase = localStorage.getItem("SALON_CLASE");
    var gradoAula = parseInt(localStorage.getItem("GRADO_AULA").charAt(0));

    $.ajax({
      url: "registro.php",
      method: "POST",
      data: {
        codigo_aula: codigoAula,
        salon_clase: salonClase,
        grado_aula: gradoAula
      },
      success: function(response) {
        // Procesar la respuesta aquí
        console.log("Datos enviados correctamente");
        console.log(response); // Mostrar la respuesta en la consola
      },
      error: function(xhr, status, error) {
        // Manejar errores aquí
        console.log("Error al enviar los datos");
        console.log(error);
      }
    });
  });
});


