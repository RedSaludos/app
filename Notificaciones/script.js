// Cargar notificaciones desde un archivo JSON cuando el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
    fetch('notificaciones.json') // Carga el archivo JSON de notificaciones
        .then(response => response.json()) // Convierte la respuesta a JSON
        .then(data => {
            const notificationsContainer = document.getElementById('notifications-container'); // Obtiene el contenedor de notificaciones
            data.forEach(notification => {
                const notificationElement = document.createElement('div'); // Crea un elemento div para cada notificación
                notificationElement.classList.add('notification', notification.type); // Añade clases CSS basadas en el tipo de notificación
                notificationElement.innerText = notification.message; // Establece el texto de la notificación
                notificationsContainer.appendChild(notificationElement); // Agrega el elemento al contenedor de notificaciones
            });
        })
        .catch(error => console.error('Error fetching notifications:', error)); // Maneja errores en la carga de notificaciones
});

// Manejo de funcionalidades de interfaz de usuario
const body = document.querySelector('body'), // Selección del elemento body
      sidebar = body.querySelector('nav'), // Selección de la barra lateral de navegación
      toggle = body.querySelector(".toggle"), // Selección del botón de alternancia de barra lateral
      searchBtn = body.querySelector(".search-box"), // Selección del botón de búsqueda
      modeSwitch = body.querySelector(".toggle-switch"), // Selección del interruptor de modo
      modeText = body.querySelector(".mode-text"); // Selección del texto de modo

// Alternar visibilidad de la barra lateral al hacer clic en el botón de alternancia
toggle.addEventListener("click" , () => {
    sidebar.classList.toggle("close"); // Alterna la clase 'close' en la barra lateral de navegación
});

// Abrir la barra lateral al hacer clic en el botón de búsqueda
searchBtn.addEventListener("click" , () => {
    sidebar.classList.remove("close"); // Remueve la clase 'close' de la barra lateral de navegación
});

// Cambiar entre modos claro y oscuro al hacer clic en el interruptor de modo
modeSwitch.addEventListener("click" , () => {
    body.classList.toggle("dark"); // Alterna la clase 'dark' en el body para cambiar entre modos claro y oscuro
    
    // Actualiza el texto del modo según el estado actual
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    } else {
        modeText.innerText = "Dark mode";
    }
});
