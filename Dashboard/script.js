// Selección de elementos del DOM
const body = document.querySelector('body'); // Selecciona el elemento <body>
const sidebar = body.querySelector('nav'); // Selecciona el elemento <nav> dentro del <body>
const toggle = body.querySelector(".toggle"); // Selecciona el elemento con clase "toggle"
const searchBtn = body.querySelector(".search-box"); // Selecciona el elemento con clase "search-box"
const modeSwitch = body.querySelector(".toggle-switch"); // Selecciona el elemento con clase "toggle-switch"
const modeText = body.querySelector(".mode-text"); // Selecciona el elemento con clase "mode-text"

// Evento de clic en el botón toggle
toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close"); // Alterna la clase "close" en la barra lateral <nav>
});

// Evento de clic en el botón de búsqueda
searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close"); // Remueve la clase "close" de la barra lateral <nav>
});

// Evento de clic en el interruptor de modo (claro/oscuro)
modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark"); // Alterna la clase "dark" en el <body>

    // Actualiza el texto del modo según el estado actual
    if (body.classList.contains("dark")) {
        modeText.innerText = "Modo Claro"; // Si está en modo oscuro, muestra "Modo Claro"
    } else {
        modeText.innerText = "Modo Oscuro"; // Si no está en modo oscuro, muestra "Modo Oscuro"
    }
});
