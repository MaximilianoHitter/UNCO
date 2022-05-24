//Seleccionar el span
const spanFecha = document.querySelector('.fecha');
//Obtener el año
const fechaActual = new Date().getFullYear() - 15;
console.log(fechaActual);
//Agregar el año al span
spanFecha.textContent = `${fechaActual}`;

