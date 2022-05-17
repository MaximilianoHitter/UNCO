//Logica de años
const arrayMeses = [
    [31], [28], [31], [30], [31], [30], [31], [31], [30], [31], [30], [31]
];

const calcularAnio = (e) => {
    let esBisiesto = null;
    if(e % 4 == 0){
        //paso 2
        if(e % 100 == 0){
            //paso 3
            if(e % 400 == 0){
                //paso 4
                //es bisiesto
                esBisiesto = true;
            }else{
                //paso 5
                //no es bisiesto
                esBisiesto = false;
            }
        }else{
            //paso 4
            //es bisiesto
            esBisiesto = true;
        }
    }else{
        //paso 5
        //no es bisiesto
        esBisiesto = false;
    }
    return esBisiesto;
}



//Selectores
const formulario = document.querySelector('.formulario');
const fechaDate = document.querySelector('.fechaInput');

const errorFI = document.querySelector('.errorFI');

const edad = document.querySelector('.edadInput');
const importe = document.querySelector('.importeInput');
const email = document.querySelector('.emailInput');
const nombre = document.querySelector('.nombreInput');
const apellido = document.querySelector('.apellidoInput');
const anexo = document.querySelector('.anexo');
const submit = document.querySelector('.submit');

//eventListeners
//submit.addEventListener('click', cargarFormulario);

fechaDate.addEventListener('change', (e) => {
    let fechaStr = e.target.value;
    //console.log(typeof fechaStr);
    let anio = fechaStr.slice(0, 4);
    //console.log(e.target.value);
    console.log(anio);
    anio = parseInt(anio);
    //console.log(typeof anio);
    //console.log(anio);
    if(calcularAnio(anio)){
        console.log('Es bisiesto');
        errorFI.textContent = 'O';
        errorFI.classList.add('correcto');
        errorFI.classList.remove('error');
    }else{
        console.log('No es bisiesto');
        errorFI.textContent = 'X';
        errorFI.classList.add('error');
        errorFI.classList.remove('correcto');
    }
})