//Logica de años
const arrayMeses = [
    [31],
    [28],
    [31],
    [30],
    [31],
    [30],
    [31],
    [31],
    [30],
    [31],
    [30],
    [31]
];

const calcularAnio = (e) => {
    let esBisiesto = null;
    if (e % 4 == 0) {
        //paso 2
        if (e % 100 == 0) {
            //paso 3
            if (e % 400 == 0) {
                //paso 4
                //es bisiesto
                esBisiesto = true;
            } else {
                //paso 5
                //no es bisiesto
                esBisiesto = false;
            }
        } else {
            //paso 4
            //es bisiesto
            esBisiesto = true;
        }
    } else {
        //paso 5
        //no es bisiesto
        esBisiesto = false;
    }
    return esBisiesto;
}



//Selectores
const formulario = document.querySelector('.formulario');
const fechaDate = document.querySelector('.fechaInput');

//const errorFI = document.querySelector('.errorFI');

const edad = document.querySelector('.edadInput');
const importe = document.querySelector('.importeInput');
const email = document.querySelector('.emailInput');
const nombre = document.querySelector('.nombreInput');
const apellido = document.querySelector('.apellidoInput');
const anexo = document.querySelector('.anexo');
const submit = document.querySelector('.submit');

//eventListeners
//submit.addEventListener('click', cargarFormulario);
//Comprobacion de fecha
fechaDate.addEventListener('change', (e) => {
    let fechaStr = e.target.value;
    let arrayFecha = fechaStr.split('/');
    console.table(arrayFecha);
    let anio = parseInt(arrayFecha[2]);
    let dia = parseInt(arrayFecha[0]);
    let mes = parseInt(arrayFecha[1]) - 1;
    //Comprobar si es año bisiesto 
    if (calcularAnio(anio)) {
        //Es bisiesto
        arrayMeses[1] = 29;
        console.log('Es bisiesto');
    } else {
        arrayMeses[1] = 28;
    }

    //Comprobar si el mes esta bien
    if (mes <= 11 && mes >= 0) {
        //comprobar si la cantidad de dias esta bien
        let cantidadDias = parseInt(arrayMeses[mes]);
        if (cantidadDias >= dia) {
            //gut
            /*errorFI.classList.remove('error');
            errorFI.classList.add('correcto');
            errorFI.textContent = 'O';*/
            fechaDate.classList.remove('error');
            fechaDate.classList.add('correcto');
        } else {
            /*errorFI.classList.remove('correcto');
            errorFI.classList.add('error');
            errorFI.textContent = 'X';*/
            fechaDate.classList.remove('correcto');
            fechaDate.classList.add('error');
        }
    } else {
        /*errorFI.classList.remove('correcto');
        errorFI.classList.add('error');
        errorFI.textContent = 'X';*/
        fechaDate.classList.remove('correcto');
        fechaDate.classList.add('error');
    }


})

//Comprobacion de edad 
//Faltaria comprobar si esta bien segun la fecha de nacimiento
edad.addEventListener('change', (e) => {
    let edadValor = e.target.value;
    if ((edadValor % 1) != 0 || edadValor <= 0) {
        //bad
        edad.classList.remove('correcto');
        edad.classList.add('error');
    } else {
        //gut
        edad.classList.remove('error');
        edad.classList.add('correcto');
    }
})

//Comprobacion del importe
importe.addEventListener('change', (e) => {
    let importeValor = e.target.value;
    if (importeValor <= 0) {
        //bad
        importe.classList.remove('correcto');
        importe.classList.add('error');
    } else {
        //gut
        importe.classList.remove('error');
        importe.classList.add('correcto');
    }
})

//Comprobacion de email 
email.addEventListener('change', (e) => {
    emailValor = e.target.value;
    if (emailValor.includes('@')) {
        //gut
        if (emailValor.includes('.com')) {
            //gut
            email.classList.remove('error');
            email.classList.add('correcto');
        } else {
            //bad 
            email.classList.remove('correcto');
            email.classList.add('error');
        }
    } else {
        //bad
        email.classList.remove('correcto');
        email.classList.add('error');
    }
})

//Comprobacion nombre 
nombre.addEventListener('change', (e) => {
    let nombreValor = e.target.value;

})

//help text