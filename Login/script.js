const container = document.getElementById('container'); // Selecciona el contenedor principal
const registerBtn = document.getElementById('register'); // Selecciona el botón de registro
const loginBtn = document.getElementById('login'); // Selecciona el botón de inicio de sesión

registerBtn.addEventListener('click', () => {
    container.classList.add("active"); // Añade la clase "active" al contenedor al hacer clic en "Registrarse"
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active"); // Elimina la clase "active" del contenedor al hacer clic en "Usuario Existente"
});
