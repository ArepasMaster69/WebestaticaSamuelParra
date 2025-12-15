const boton = document.getElementById('cambiarMensaje');
const mensaje = document.getElementById('mensaje');


const mensajes = [
    '¡Bienvenido a mi página web!',
    '¡Gracias por visitarme!',
    '¡Espero que tengas un gran día!',
    '¡Hola! Encantado de verte por aquí.'
];


let indice = 0;


boton.addEventListener('click', () => {
    indice = (indice + 1) % mensajes.length;
    mensaje.textContent = mensajes[indice];
});