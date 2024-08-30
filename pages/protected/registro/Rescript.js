var img = new Array(
  "registro/wraper.webp",
  "registro/fondo1.webp",
  "registro/fondo2.webp",
  "registro/fondo3.webp"
);

// Pre cargar las imágenes
img.forEach(function (src) {
  var image = new Image();
  image.src = src;
});

var posicion = 0;
var imagen = document.querySelector(".card-img");
imagen.style.backgroundImage = "url(" + img[posicion] + ")";

function Izquierda() {
  if (posicion == 0) {
    posicion = 3;
  } else {
    posicion--;
  }
  imagen.style.backgroundImage = "url(" + img[posicion] + ")";
}

function Derecha() {
  if (posicion == 3) {
    posicion = 0;
  } else {
    posicion++;
  }
  imagen.style.backgroundImage = "url(" + img[posicion] + ")";
}


var scrollEvent = function () {
  var position = window.scrollY || document.documentElement.scrollTop;
  var elemento1 = document.getElementById("icon-fire");

  if (elemento1) {
    elemento1.style.top = position * 0.035 + "px";
  }
};

window.addEventListener("scroll", scrollEvent);

function setTextContent(elementId, storageKey) {
  var element = document.getElementById(elementId);
  var storedText = localStorage.getItem(storageKey);

  element.textContent = storedText;
}

setTextContent("CODIGO_AULA", "CODIGO_AULA");
setTextContent("SALON_CLASE", "SALON_CLASE");
setTextContent("GRADO_AULA", "GRADO_AULA");

function cargarFAQ(contenedor, clase) {
  fetch("faq.html")
    .then((response) => response.text())
    .then((data) => {
      document.querySelector(contenedor).innerHTML = data;
      const script = document.createElement("script");
      script.src = "FAQ/faq.js";
      document.querySelector(contenedor).appendChild(script);
      document.querySelector(clase).classList.add('mostrando');
    });
}

document.querySelector("#botonFaq").addEventListener("click", () => {
  cargarFAQ("#enrollado", '.containerr');
});

document.querySelector("#botonAcerca").addEventListener("click", () => {
  cargarFAQ("#enrollado", '.about-container');
});

document.querySelector("#botonHelp").addEventListener("click", () => {
  cargarFAQ("#enrollado", '.help-section');
});

document.querySelector("#botonHelp").addEventListener("click", () => {
  cargarFAQ("#enrollado", '.help-section');
});

btnTeam = document.querySelectorAll("#botonTeam");
btnTeam.forEach((btn) => {
  btn.addEventListener("click", () => {
    cargarFAQ("#enrollado", '.contain-team');
  });
});

