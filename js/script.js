const inputNombre = document.getElementById('nombreInput');
const boton = document.getElementById('btnProcesar');
const mensajeSalida = document.getElementById('mensaje');

boton.addEventListener('click', () => {
    const nombreUsuario = inputNombre.value;

    if (nombreUsuario.trim() === "") {
        mensajeSalida.textContent = "¡Por favor, escribe algo en la caja!";
        mensajeSalida.style.color = "red";
        return;
    }


    const nombreProcesado = nombreUsuario.toUpperCase();

    mensajeSalida.style.color = "#064E3B";
    mensajeSalida.textContent = `¡Hola, ${nombreProcesado}! Bienvenido a la web de Samuel.`;

    inputNombre.value = "";
});