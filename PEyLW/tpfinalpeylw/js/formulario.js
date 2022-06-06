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
const errorForm = document.querySelector('.errorForm');
const fechaDate = document.querySelector('.fechaInput');
const Hfecha = document.querySelector('.Hfecha');
const edad = document.querySelector('.edadInput');
const Hedad = document.querySelector('.Hedad');
const importe = document.querySelector('.importeInput');
const Himporte = document.querySelector('.Himporte');
const email = document.querySelector('.emailInput');
const Hemail = document.querySelector('.Hemail');
const nombre = document.querySelector('.nombreInput');
const Hnombre = document.querySelector('.Hnombre');
const apellido = document.querySelector('.apellidoInput');
const Hapellido = document.querySelector('.Hapellido');
const anexo = document.querySelector('.anexo');
const submit = document.querySelector('.submit');

//RegExp
const verificacion = new RegExp(/^[a-zA-Z ]+$/);


//eventListeners
//submit.addEventListener('click', cargarFormulario);
//Comprobacion de fecha
fechaDate.addEventListener('change', (e) => {
    let fechaStr = e.target.value;
    let arrayFecha = fechaStr.split('/');
    //console.table(arrayFecha);
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
            fechaDate.classList.remove('error');
            fechaDate.classList.add('correcto');
            Hfecha.classList.add('invisible');
            Hfecha.classList.remove('visible');
        } else {
            //bad
            fechaDate.classList.remove('correcto');
            fechaDate.classList.add('error');
            Hfecha.classList.remove('invisible');
            Hfecha.classList.add('visible');
        }
    } else {
        //bad
        fechaDate.classList.remove('correcto');
        fechaDate.classList.add('error');
        Hfecha.classList.remove('invisible');
        Hfecha.classList.remove('visible');
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
        Hedad.classList.remove('invisible');
        Hedad.classList.add('visible');
        
    } else {
        //gut
        edad.classList.remove('error');
        edad.classList.add('correcto');
        Hedad.classList.add('invisible');
        Hedad.classList.remove('visible');
    }
})

//Comprobacion del importe
importe.addEventListener('change', (e) => {
    let importeValor = e.target.value;
    if (importeValor <= 0) {
        //bad
        importe.classList.remove('correcto');
        importe.classList.add('error');
        Himporte.classList.remove('invisible');
        Himporte.classList.add('visible');
    } else {
        if(importeValor)
        //gut
        importe.classList.remove('error');
        importe.classList.add('correcto');
        Himporte.classList.add('invisible');
        Himporte.classList.remove('visible');
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
            Hemail.classList.add('invisible');
            Hemail.classList.remove('visible');
        } else {
            //bad 
            email.classList.remove('correcto');
            email.classList.add('error');
            Hemail.classList.remove('invisible');
            Hemail.classList.add('visible');
        }
    } else {
        //bad
        email.classList.remove('correcto');
        email.classList.add('error');
        Hemail.classList.remove('invisible');
        Hemail.classList.add('visible');
    }
})

//Comprobacion nombre 
nombre.addEventListener('change', (e) => {
    let nombreValor = e.target.value;
    if(!verificacion.test(nombreValor)){
        //bad
        nombre.classList.add('error');
        nombre.classList.remove('correcto');
        Hnombre.classList.remove('invisible');
        Hnombre.classList.add('visible');
    }else{
        //gut
        nombre.classList.add('correcto');
        nombre.classList.remove('error');
        Hnombre.classList.add('invisible');
        Hnombre.classList.remove('visible');
    }


})

//Comprobacion apellido
apellido.addEventListener('change', (e) => {
    let apellidoValor = e.target.value;
    if(!verificacion.test(apellidoValor)){
        //bad
        apellido.classList.add('error');
        apellido.classList.remove('correcto');
        Hapellido.classList.remove('invisible');
        Hapellido.classList.add('visible');
    }else{
        //gut
        apellido.classList.add('correcto');
        apellido.classList.remove('error');
        Hapellido.classList.add('invisible');
        Hapellido.classList.remove('visible');
    }
})

//Submit

submit.addEventListener('click', (e) => {
    e.preventDefault();
    if(fechaDate.classList.contains('error') || edad.classList.contains('error') || importe.classList.contains('error') || email.classList.contains('error') || nombre.classList.contains('error') || apellido.classList.contains('error')){
        //bad
        errorForm.classList.remove('invisible');
        errorForm.classList.add('visible');
    }else{
        //gut
        errorForm.classList.remove('error');
        errorForm.classList.add('invisible');
        let objDatos = {
            fecha:fechaDate.value,
            edad:edad.value,
            importe:importe.value,
            email:email.value,
            nombre:nombre.value,
            apellido:apellido.value,
            anexo:anexo.value
        };
        //console.table(objDatos);
        localStorage.setItem('usuario', JSON.stringify(objDatos));
    }
    
})