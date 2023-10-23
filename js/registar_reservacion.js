// Obtener el botón
const openPopupBtn = document.getElementById("Button-Regis");


// Agregar un evento de clic al botón
openPopupBtn.addEventListener("click", () => {
  // Calcular el centro de la pantalla
  const screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  const screenHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
  const popupWidth = 650; // Ancho de la ventana emergente
  const popupHeight = 500; // Alto de la ventana emergente
  const leftPosition = (screenWidth - popupWidth) / 2;
  const topPosition = (screenHeight - popupHeight) / 2;

  // Abrir una nueva ventana emergente con prueba.html en el centro de la pantalla
  const popupWindow = window.open("reservacion.html", "PopupWindow", `width=${popupWidth},height=${popupHeight},left=${leftPosition},top=${topPosition}`);
});