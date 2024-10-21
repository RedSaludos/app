// Seleccionar elementos del DOM
const body = document.querySelector('body'); // Selecciona el cuerpo del documento
const sidebar = body.querySelector('nav'); // Selecciona la barra lateral de navegación
const toggle = body.querySelector(".toggle"); // Selecciona el botón de alternancia de la barra lateral
const searchBtn = body.querySelector(".search-box"); // Selecciona el botón de búsqueda
const modeSwitch = body.querySelector(".toggle-switch"); // Selecciona el interruptor de modo (oscuro/claro)
const modeText = document.querySelector(".mode-text"); // Selecciona el texto que indica el modo actual
const editProfileBtn = document.querySelector(".edit-profile-button"); // Selecciona el botón para editar perfil
const messageBtn = document.querySelector(".message-button"); // Selecciona el botón para mensaje
const editProfileModal = document.getElementById('edit-profile-modal'); // Obtiene el modal de edición de perfil por su ID
const messageModal = document.getElementById('message-modal'); // Obtiene el modal de mensaje por su ID
const closeModalBtns = document.querySelectorAll(".close"); // Obtiene todos los botones para cerrar modales

// Evento para alternar la visibilidad de la barra lateral
toggle.addEventListener("click", () => {
  sidebar.classList.toggle("close"); // Alterna la clase 'close' en la barra lateral
});

// Evento para realizar una búsqueda al hacer clic en el botón de búsqueda
searchBtn.addEventListener("click", () => {
  let searchTerm = document.querySelector("input[type='text']").value; // Obtiene el valor del campo de búsqueda
  if (searchTerm.trim() !== "") {
    // Si hay un término de búsqueda válido, realiza la búsqueda o muestra resultados
    console.log("Buscando paciente: " + searchTerm);
  } else {
    // Si no hay un término de búsqueda válido, muestra una alerta
    alert("Por favor ingrese un término de búsqueda válido.");
  }
});

// Evento para alternar entre los modos oscuro y claro
modeSwitch.addEventListener("click", () => {
  body.classList.toggle("dark"); // Alterna la clase 'dark' en el cuerpo del documento

  if (body.classList.contains("dark")) {
    // Si el cuerpo tiene la clase 'dark', ajusta el texto del modo y guarda el tema en localStorage
    modeText.innerText = "Modo Claro";
    localStorage.setItem("theme", "dark");
  } else {
    // Si el cuerpo no tiene la clase 'dark', ajusta el texto del modo y guarda el tema en localStorage
    modeText.innerText = "Modo Oscuro";
    localStorage.setItem("theme", "light");
  }
});

// Evento que se ejecuta cuando el documento ha sido completamente cargado
document.addEventListener("DOMContentLoaded", () => {
  const savedTheme = localStorage.getItem("theme"); // Obtiene el tema guardado en localStorage
  if (savedTheme === "dark") {
    // Si el tema guardado es oscuro, aplica la clase 'dark' al cuerpo y ajusta el texto del modo
    body.classList.add("dark");
    modeText.innerText = "Modo Claro";
  } else {
    // Si el tema guardado no es oscuro, asegura que el cuerpo no tenga la clase 'dark' y ajusta el texto del modo
    body.classList.remove("dark");
    modeText.innerText = "Modo Oscuro";
  }
});

// Evento para mostrar el modal de edición de perfil al hacer clic en el botón correspondiente
editProfileBtn.addEventListener("click", () => {
  editProfileModal.style.display = "block";
});

// Evento para mostrar el modal de mensaje al hacer clic en el botón correspondiente
messageBtn.addEventListener("click", () => {
  messageModal.style.display = "block";
});

// Eventos para cerrar los modales al hacer clic en los botones de cerrar
closeModalBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    editProfileModal.style.display = "none";
    messageModal.style.display = "none";
  });
});

// Evento para cerrar los modales al hacer clic fuera de ellos
window.addEventListener("click", (event) => {
  if (event.target === editProfileModal || event.target === messageModal) {
    editProfileModal.style.display = "none";
    messageModal.style.display = "none";
  }
});
