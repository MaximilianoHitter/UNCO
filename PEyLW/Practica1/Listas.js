//Elementos
const body = document.querySelector('body');
const head = document.querySelector('head');

//Title
const titulo = document.createElement('title');
const tituloTexto = document.createTextNode('Listas');
titulo.appendChild(tituloTexto);

//Primer strong
const elemento1 = document.createElement('strong');
elemento1.textContent = 'Lista no ordenada:';
elemento1.style.fontWeight = 'bolder';

//Segundo strong
const elemento2 = document.createElement('strong');
const elemento2Texto = document.createTextNode('Lista ordenada:');
elemento2.appendChild(elemento2Texto);
elemento2.style.fontWeight = 'bolder';

//Tercer strong
const elemento3 = document.createElement('strong');
elemento3.textContent = 'Glosario';
elemento3.style.fontWeight = 'bolder';


//Primera lista desordenada
const ul1 = document.createElement('ul');
ul1.classList.add('primera-lista');

//Primera lista ordenada
const ol1 = document.createElement('ol');


//Elementos li
const li1 = document.createElement('li');
const li1Texto = document.createTextNode('CPU rápida');
li1.appendChild(li1Texto);

const li11 = document.createElement('li');
const li11Texto = document.createTextNode('CPU rápida');
li11.appendChild(li11Texto);

const li2 = document.createElement('li');
const li2Texto = document.createTextNode('Impresora a color de buena definición');
li2.appendChild(li2Texto);

const li21 = document.createElement('li');
const li21Texto = document.createTextNode('Impresora a color de buena definición');
li21.appendChild(li21Texto);

const li3 = document.createElement('li');
const li3Texto = document.createTextNode('Altavoces y cámara de video');
li3.appendChild(li3Texto);

const li31 = document.createElement('li');
const li31Texto = document.createTextNode('Altavoces y cámara de video');
li31.appendChild(li31Texto);

//Añadir li's a ul1
ul1.appendChild(li1);
ul1.appendChild(li2);
ul1.appendChild(li3);

//Añadir li's a ol1
ol1.appendChild(li11);
ol1.appendChild(li21);
ol1.appendChild(li31);

//texto solo
const texto = document.createTextNode('Hipertexto');
const texto2 = document.createTextNode('Ancho de banda de una red');

//Primer parrafo grande
const p1 = document.createElement('p');
p1.style.margin = '0px 0px 20px 0px';
p1.textContent = 'Se llama documento hipertexto a aquel que tiene zonas activas donde el usuario puede pulsar con el ratón para acceder a otro documento.';

//Segundo parrafo grande
const p2 = document.createElement('p');
p2.style.margin = '0px 0px 20px 0px';
p2.textContent = 'Es la capacidad de transmisión que soporta y está muy relacionada con la velocidad de transmisión que se puede alcanzar.';

//Añadir al head
head.appendChild(titulo);

//Añadir elementos al body
body.appendChild(elemento1);
body.appendChild(document.createElement('br'));
body.appendChild(ul1);
body.appendChild(document.createElement('br'));
body.appendChild(elemento2);
body.appendChild(document.createElement('br'));
body.appendChild(ol1);
body.appendChild(document.createElement('br'));
body.appendChild(elemento3);
body.appendChild(document.createElement('br'));
body.appendChild(document.createElement('br'));
body.appendChild(texto);
body.appendChild(p1);
body.appendChild(texto2);
body.appendChild(p2);

