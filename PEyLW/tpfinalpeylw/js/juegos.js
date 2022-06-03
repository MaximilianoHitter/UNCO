//seleccionar el select
const select = document.querySelector('.juegos');
const juego = document.querySelector('.juego');
const tituloJuego = document.querySelector('.tituloJuego');


//PARTE BARAJA
//creacion de elementos y añadido de clases
//div que contiene a la carta (baraja)
const divDeCarta = document.createElement('div');
divDeCarta.classList.add('divImagen');

//la imagen de la carta (baraja)
const imagenCarta = document.createElement('img');
imagenCarta.classList.add('imagenCarta');

const arrayTiposCartas = ['diamante.png', 'corazon.png', 'pica.png', 'trebol.png'];
const baseURL = './idea2/img/mazo/';
//la base URL es './idea2/img/mazo/mazocambiado/

//creacion del boton y su addevent (baraja)
const boton = document.createElement('button');
boton.classList.add('botonBaraja');
boton.textContent = '¡Carta al azar!';
boton.addEventListener('click', () => { baraja() });



//ver si esta inicializado el localstorage
if (JSON.parse(localStorage.getItem('usuario')) != null) {
    //console.log('taloggeado');
    let datos = JSON.parse(localStorage.getItem('usuario'));
    let nombreVisitante = datos.nombre;
    //console.log(nombreVisitante);
    tituloJuego.textContent = `, ` + nombreVisitante;
} else {
    //console.log('notaloggeado');
}

select.addEventListener('change', (e) => {
    if (e == null) {

    } else {
        //console.log(e.target.value);
    }
    switch (e.target.value) {
        case 'baraja':
            limpiarContenido();
            barajaBoton();
            break;

        case 'dados':
            limpiarContenido();
            dadosBoton();
            break;

        case 'especial':
            limpiarContenido();
            break;

        default:
            break;
    }
})

function limpiarContenido() {
    while (juego.firstChild) {
        juego.removeChild(juego.firstChild);
    }
}

/*Boton de la baraja*/
function barajaBoton() {
    juego.appendChild(boton);
    juego.appendChild(divDeCarta);
    divDeCarta.appendChild(imagenCarta);
    imagenCarta.src = './idea2/img/mazo/dorso.png';
}



/*Funcion para ver baraja, y seleccionar una carta random*/
function baraja() {
    let randomImageURL = arrayTiposCartas[Math.floor(Math.random() * arrayTiposCartas.length)];
    //console.log(randomImageURL);
    let randomNro = Math.floor(Math.random() * (14 - 1) + 1);
    if (randomNro < 10) {
        randomNro = '0' + randomNro;
    }
    //console.log(randomNro);
    let URLtotal = baseURL + randomNro + randomImageURL;
    //console.log(URLtotal);
    let imagenCartaElemento = document.querySelector('.imagenCarta');
    imagenCartaElemento.src = URLtotal;
}




//PARTE DADOS 
//creacion del boton de los dados y su addevent (dados)
const botonDados = document.createElement('button');
botonDados.classList.add('botonDados');
botonDados.textContent = '¡Dados al azar!';
botonDados.addEventListener('click', () => { dados() });

//contenedor del dado
const divDeDados = document.createElement('div');
divDeDados.classList.add('divDados');

//div de imagen de dado
const divDado = document.createElement('div');
divDado.classList.add('dado');
const v1 = document.createElement('div');
v1.classList.add('valor');
v1.classList.add('v1');

const v2 = document.createElement('div');
v2.classList.add('valor');
v2.classList.add('v2');

const v3 = document.createElement('div');
v3.classList.add('valor');
v3.classList.add('v3');

const v4 = document.createElement('div');
v4.classList.add('valor');
v4.classList.add('v4');

const v5 = document.createElement('div');
v5.classList.add('valor');
v5.classList.add('v5');

const v6 = document.createElement('div');
v6.classList.add('valor');
v6.classList.add('v6');

const v7 = document.createElement('div');
v7.classList.add('valor');
v7.classList.add('v7');

const v8 = document.createElement('div');
v8.classList.add('valor');
v8.classList.add('v8');

const v9 = document.createElement('div');
v9.classList.add('valor');
v9.classList.add('v9');


divDado.appendChild(v1);
divDado.appendChild(v2);
divDado.appendChild(v3);
divDado.appendChild(v4);
divDado.appendChild(v5);
divDado.appendChild(v6);
divDado.appendChild(v7);
divDado.appendChild(v8);
divDado.appendChild(v9);
const selv1 = document.getElementsByClassName('valor v1');
const selv2 = document.getElementsByClassName('valor v2');
const selv3 = document.getElementsByClassName('valor v3');
const selv4 = document.getElementsByClassName('valor v4');
const selv5 = document.getElementsByClassName('valor v5');
const selv6 = document.getElementsByClassName('valor v6');
const selv7 = document.getElementsByClassName('valor v7');
const selv8 = document.getElementsByClassName('valor v8');
const selv9 = document.getElementsByClassName('valor v9');
const valor = document.getElementsByClassName('valor');
/*Boton de los dados*/
function dadosBoton() {
    juego.appendChild(botonDados);
    juego.appendChild(divDeDados);
    divDeDados.appendChild(divDado);
}

selv1.backgroundColor = 'white';

function dados() {
    let nroDado = Math.floor(Math.random() * (7 - 1) + 1);
    //console.log(nroDado);
    switch (nroDado) {
        case 1:

            for (let index = 0; index < valor.length; index++) {
                valor[index].style.backgroundColor = 'white';
            }
            selv5[0].style.backgroundColor = 'black';
            break;

        case 2:
            for (let index = 0; index < valor.length; index++) {
                valor[index].style.backgroundColor = 'white';
            }
            selv2[0].style.backgroundColor = 'black';
            selv8[0].style.backgroundColor = 'black';
            break;

        case 3:
            for (let index = 0; index < valor.length; index++) {
                valor[index].style.backgroundColor = 'white';
            }
            selv1[0].style.backgroundColor = 'black';
            selv5[0].style.backgroundColor = 'black';
            selv9[0].style.backgroundColor = 'black';
            break;

        case 4:
            for (let index = 0; index < valor.length; index++) {
                valor[index].style.backgroundColor = 'white';
            }
            selv2[0].style.backgroundColor = 'black';
            selv4[0].style.backgroundColor = 'black';
            selv6[0].style.backgroundColor = 'black';
            selv8[0].style.backgroundColor = 'black';
            break;

        case 5:
            for (let index = 0; index < valor.length; index++) {
                valor[index].style.backgroundColor = 'black';
            }
            selv2[0].style.backgroundColor = 'white';
            selv4[0].style.backgroundColor = 'white';
            selv6[0].style.backgroundColor = 'white';
            selv8[0].style.backgroundColor = 'white';
            break;

        case 6:
            for (let index = 0; index < valor.length; index++) {
                valor[index].style.backgroundColor = 'black';
            }
            selv2[0].style.backgroundColor = 'white';
            selv5[0].style.backgroundColor = 'white';
            selv8[0].style.backgroundColor = 'white';

        default:
            break;
    }
}