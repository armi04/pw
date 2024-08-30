configuracion = document.querySelectorAll(".smart-content-label");
configuracion.forEach((item) => {
  let li = item.parentElement;
  li.addEventListener("click", () => {
    configuracion.forEach((link) => {
      link.parentElement.classList.remove("using");
    });
    li.classList.add("using");

    const tabsNumber = li.dataset.forTab;
    const tabsContainer = document.querySelector(".tab-content");
    const tabToActivate = tabsContainer.querySelector(
      `.set-card-right[data-tab="${tabsNumber}"]`
    );

    const activeTab = tabsContainer.querySelector(".set-card-right.show");

    if (activeTab) {
      activeTab.classList.remove("show");
      setTimeout(function () {
        activeTab.classList.remove("display");
        setTimeout(function () {
          tabToActivate.classList.add("display");
          setTimeout(function () {
            tabToActivate.classList.add("show");
          }, 20); // Retraso de 20 ms para aplicar la clase "show" después de "display"
        }, 0);
      }, getTransitionDuration(activeTab));
    }

    function getTransitionDuration(element) {
      const style = window.getComputedStyle(element);
      const duration = style.getPropertyValue("transition-duration");

      return parseFloat(duration) * 1000; // Convertir a milisegundos
    }
  });
});

buttonSize = document.querySelector(".button-size");
enrollado = document.getElementById("enrollado");
botones = buttonSize.querySelectorAll(".btn-size");

function asignarBotonChosen() {
  const fontSize = enrollado.style.fontSize;

  // Remover la clase "chosen" de todos los botones
  botones.forEach((btn) => {
    btn.classList.remove("chosen");
  });

  // Asignar la clase "chosen" al botón correspondiente según el tamaño de fuente
  if (fontSize === "1.2em") {
    botones[2].classList.add("chosen");
  } else if (fontSize === "1.1em") {
    botones[1].classList.add("chosen");
  } else {
    botones[0].classList.add("chosen");
  }
}

// Añadir event listener a cada botón
botones.forEach((btn) => {
  btn.addEventListener("click", function () {
    // Remover la clase "chosen" del botón actualmente seleccionado
    const currentButton = buttonSize.querySelector(".btn-size.chosen");
    if (currentButton) {
      currentButton.classList.remove("chosen");
    }

    // Añadir la clase "chosen" al botón presionado
    btn.classList.add("chosen");

    // Obtener el tamaño de fuente correspondiente al botón
    const fontSize = btn.dataset.fontSize;

    // Establecer el tamaño de fuente en el elemento enrollado
    enrollado.style.fontSize = fontSize;

    // Verificar y asignar el botón "chosen" según el tamaño de fuente actual
    asignarBotonChosen();
  });
});

asignarBotonChosen();


themeToggler = document.querySelector(".toggleWrapper");
dn = document.querySelector(".dn");
body = document.body;

if (body.classList.contains("darkness")) {
  dn.checked = true;
  themeToggler.classList.add("darkness");
}else{
  themeToggler.classList.remove("darkness");
}

themeToggler.addEventListener("change", () => {
  themeToggler.classList.toggle("darkness");
  if (themeToggler.classList.contains("darkness")) {
    body.classList.add("darkness"); 
  } else {
    body.classList.remove("darkness");
  }
});

document.querySelectorAll('.theme-colors .color').forEach(color =>{
  color.onclick = () => {
    let background =color.style.background;
    let textColor =color.style.color;
    let borderColor =color.style.fill;
    let boxShadow =color.style.stroke;
    let outlineArrow =color.style.outline;
    document.querySelector(':root').style.setProperty('--color-open', background);
    document.querySelector(':root').style.setProperty('--confi-using-color', textColor);
    document.querySelector(':root').style.setProperty('--confi-hover-color', borderColor);
    document.querySelector(':root').style.setProperty('--confi-hover-shadow', boxShadow);
    document.querySelector(':root').style.setProperty('--color-input-focus-selected', textColor);
    document.querySelector(':root').style.setProperty('--color-arrow-wraper', outlineArrow);
  }
});

