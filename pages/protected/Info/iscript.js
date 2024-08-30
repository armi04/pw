buttonEditar = document.querySelector(".btn-pas");

buttonEditar.onclick = function () {
  document.querySelector("#btnSetting").click();
  setTimeout(() => {
    // Cambiar a la ventana deseada
    const tab2 = document.querySelector(
      '.smart-list-container[data-for-tab="2"]'
    );
    if (tab2) {
      tab2.click();
    }
  }, 40);
};
