
// Lógica para mostrar/ocultar el campo de contraseña
const loginForm = document.getElementById("loginForm");
const userTypeSelect = document.getElementById("userType");
const passwordSection = document.getElementById("passwordSection");
const errorMessage = document.getElementById("error");




// Evento para manejar el submit del formulario
loginForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const userType = userTypeSelect.value;
    const password = document.getElementById("password").value.trim();
    console.log(userType);

    // Verificar tipo de usuario
    if (userType === "admin") {
        // Validar contraseña para administrador
        if (password === "admin123") {
            // Redirigir al administrador
            window.location.href = "http://localhost/usuarios_plataformas_gsnab/frontend_plataformas_gsnab/subir_excel/index.html";  // Cambia esto a la página del administrador
        } else {
            errorMessage.textContent = "Contraseña incorrecta para el administrador.";
        }
    }


    if (userType === "estudiante") {
        console.log("Redirigiendo al estudiante...");
        // Redirigir al estudiante sin necesidad de contraseña
        window.location.href = "http://localhost/usuarios_plataformas_gsnab/frontend_plataformas_gsnab/Consultar/index.html";  // Cambia esto a la página del estudiante
    } else {
        errorMessage.textContent = "Por favor, selecciona un tipo de usuario.";
    }
});

// Mostrar la sección de contraseña solo si se selecciona 'admin'
userTypeSelect.addEventListener("change", function () {
    if (userTypeSelect.value === "admin") {
        passwordSection.style.display = "block";
    } else {
        passwordSection.style.display = "none";
    }
});

