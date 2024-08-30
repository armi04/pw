//Declarando variables
let sidebar = document.querySelector(".sidebar");
let abrir = document.querySelector(".open");
let enrolla = document.querySelector("#enrollado");

//Evento para el icono hamburguesa
document.querySelector(".burguer").addEventListener("click", animateBurguer);
var line1_burguer = document.querySelector(".line1-bar");
var line2_burguer = document.querySelector(".line2-bar");
var line3_burguer = document.querySelector(".line3-bar");

//Evento del indicador en el sidebar
const indicador = document.querySelector(".selected");
var buttonCa = document.querySelector("#btnCargar");
var buttonSa = document.querySelector("#btnSalir");
var buttonHor = document.querySelector("#btnHor");
var buttonS = document.querySelector("#btnSetting");
var buttonI = document.querySelector("#btnInfo");
var buttonC = document.querySelector("#btnCurso");

//Evento para mostrar y ocultar menu (Añade clase .active)
btn.onclick = function () {
  sidebar.classList.toggle("active");
  abrir.classList.toggle("active");
};

//si la pagina es menor a 760px, se oculta el menu al recargar
if (window.innerWidth < 760) {
  abrir.classList.remove("active");
  sidebar.classList.add("active");
  menor_a_760();
}

if (window.innerWidth > 760) {
  enrolla.onclick = function () {
    sidebar.classList.remove("active");
    abrir.classList.remove("active");
    desanimateBurguer();
  };
  mayor_a_760();
} else if (window.innerWidth < 760) {
  enrolla.onclick = function () {
    sidebar.classList.add("active");
    abrir.classList.remove("active");
    desanimateBurguer();
  };
}
//Evento para hacer un menu responsive

window.addEventListener("resize", function () {
  if (window.innerWidth > 760) {
    sidebar.classList.remove("active");
    abrir.classList.remove("active");

    enrolla.onclick = function () {
      sidebar.classList.remove("active");
      abrir.classList.remove("active");
      desanimateBurguer();
    };

    mayor_a_760();
  }

  if (window.innerWidth < 760) {
    sidebar.classList.add("active");
    abrir.classList.remove("active");

    enrolla.onclick = function () {
      sidebar.classList.add("active");
      abrir.classList.remove("active");
      desanimateBurguer();
    };

    menor_a_760();
  }
});

function animateBurguer() {
  line1_burguer.classList.toggle("crossline1-bar");
  line2_burguer.classList.toggle("crossline2-bar");
  line3_burguer.classList.toggle("crossline3-bar");
}

function desanimateBurguer() {
  line1_burguer.classList.remove("crossline1-bar");
  line2_burguer.classList.remove("crossline2-bar");
  line3_burguer.classList.remove("crossline3-bar");
}
function mayor_a_760() {
  buttonC.onclick = function () {
    abrir.classList.remove("active");
    sidebar.classList.remove("active");
    desanimateBurguer();
    indicador.style.transform = "translateY(0px)";
  };

  buttonCa.onclick = function () {
    abrir.classList.remove("active");
    sidebar.classList.remove("active");
    desanimateBurguer();
    indicador.style.transform = "translateY(74px)";
  };

  buttonI.onclick = function () {
    abrir.classList.remove("active");
    sidebar.classList.remove("active");
    desanimateBurguer();
    indicador.style.transform = "translateY(148px)";
  };

  buttonHor.onclick = function () {
    abrir.classList.remove("active");
    sidebar.classList.remove("active");
    desanimateBurguer();
    indicador.style.transform = "translateY(222px)";
  };

  buttonS.onclick = function () {
    abrir.classList.remove("active");
    sidebar.classList.remove("active");
    desanimateBurguer();
    indicador.style.transform = "translateY(296px)";
  };

  buttonSa.onclick = function () {
    abrir.classList.remove("active");
    sidebar.classList.remove("active");
    desanimateBurguer();
    indicador.style.transform = "translateY(369px)";
  };
}

function menor_a_760() {
  buttonC.onclick = function () {
    indicador.style.transform = "translateY(0px)";
    sidebar.classList.add("active");
    desanimateBurguer();
  };

  buttonCa.onclick = function () {
    indicador.style.transform = "translateY(74px)";
    sidebar.classList.add("active");
    desanimateBurguer();
  };

  buttonI.onclick = function () {
    indicador.style.transform = "translateY(148px)";
    sidebar.classList.add("active");
    desanimateBurguer();
  };

  buttonHor.onclick = function () {
    indicador.style.transform = "translateY(222px)";
    sidebar.classList.add("active");
    desanimateBurguer();
  };

  buttonS.onclick = function () {
    indicador.style.transform = "translateY(296px)";
    sidebar.classList.add("active");
    desanimateBurguer();
  };

  buttonSa.onclick = function () {
    indicador.style.transform = "translateY(369px)";
    sidebar.classList.add("active");
    desanimateBurguer();
  };
}

var btnAbrirPopup = document.getElementById("icon-head-open"),
  overlay = document.getElementById("overlay"),
  popups = document.getElementsByClassName("popup"),
  btnCerrarPopup = document.getElementsByClassName("btn-cerrar-popup"),
  btnContinuarPopup = document.getElementsByClassName("btn-siguiente-popup"),
  currentPopupIndex = 0;

btnAbrirPopup.addEventListener("click", function () {
  overlay.classList.add("active");
  setTimeout(function () {
    popups[currentPopupIndex].classList.add("showed");
  }, 20);
});

// Cerrar el popup correspondiente al botón presionado
for (var i = 0; i < btnCerrarPopup.length; i++) {
  btnCerrarPopup[i].addEventListener("click", function () {
    var currentPopup = this.closest(".popup");
    currentPopup.classList.remove("showed");
    currentPopup.classList.remove("displayed");
    overlay.classList.remove("active");
    currentPopupIndex = 0; // Reiniciar el índice al cerrar el popup

    popups[0].classList.add("displayed");
    popups[0].classList.add("showed");
  });
}

// Mostrar la siguiente ventana modal
for (var i = 0; i < btnContinuarPopup.length; i++) {
  btnContinuarPopup[i].addEventListener("click", function () {
    var currentPopup = this.closest(".popup");
    currentPopup.classList.remove("showed");
    currentPopup.classList.remove("displayed");
    setTimeout(function () {
      currentPopupIndex++;
      if (currentPopupIndex < popups.length) {
        popups[currentPopupIndex].classList.add("displayed");
        setTimeout(function () {
          popups[currentPopupIndex].classList.add("showed");
        }, 20);
      } else {
        overlay.classList.remove("active");
        currentPopupIndex = 0; // Reiniciar el índice al cerrar el popup

        // Restaurar las clases del primer popup
        popups[0].classList.add("displayed");
        popups[0].classList.add("showed");
      }
    }, 20);
  });
}

//Utilizando FETCH para realizar llamadas asincronas

document.querySelector("#btnCurso").addEventListener("click", () => {
  fetch("cursos.php")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#enrollado").innerHTML = data;
      const script = document.createElement("script");
      script.src = "cursos/Cjavascript.js";
      document.querySelector("#enrollado").appendChild(script);
    });
});

document.querySelector("#btnCargar").addEventListener("click", () => {
  // Aquí puedes agregar el código adicional que mencionaste anteriormente
  var codigoAula = parseInt(localStorage.getItem("CODIGO_AULA"));
  var salonClase = localStorage.getItem("SALON_CLASE");
  var gradoAula = parseInt(localStorage.getItem("GRADO_AULA").charAt(0));

  var formData = new FormData();
  formData.append("codigo_aula", codigoAula);
  formData.append("salon_clase", salonClase);
  formData.append("grado_aula", gradoAula);

  fetch("registro.php", {
    method: "POST",
    body: formData
  })
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#enrollado").innerHTML = data;
      const script = document.createElement("script");
      script.src = "registro/Rescript.js";
      document.querySelector("#enrollado").appendChild(script);
    });
});

document.querySelector("#btnInfo").addEventListener("click", () => {
  fetch("info.php")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#enrollado").innerHTML = data;
      const script = document.createElement("script");
      script.src = "info/iscript.js";
      document.querySelector("#enrollado").appendChild(script);
    });
});

document.querySelector("#btnSetting").addEventListener("click", () => {
  fetch("config.php")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#enrollado").innerHTML = data;
      const script = document.createElement("script");
      script.src = "confi/confscript.js";
      document.querySelector("#enrollado").appendChild(script);
    });
});

document.querySelector("#btnHor").addEventListener("click", () => {
  fetch("horario.html")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#enrollado").innerHTML = data;
      const script = document.createElement("script");
      script.src = "horario/hscript.js";
      document.querySelector("#enrollado").appendChild(script);
    });
});
//Al cargar la pagina directamente salgan los cursos
window.addEventListener("load", function () {
  fetch("cursos.php")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector("#enrollado").innerHTML = data;
      const script = document.createElement("script");
      script.src = "cursos/Cjavascript.js";
      document.querySelector("#enrollado").appendChild(script);
    });
});
