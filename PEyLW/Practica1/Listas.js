//Elementos
const body = document.querySelector('body');
const elemento1 = document.createElement('p');
elemento1.textContent = 'Lista no ordenada:';
elemento1.style.fontWeight = 'bolder';
const br = document.createElement('br');
const ul = document.createElement('ul');
const li = document.createElement('li');
ul.classList.add('primera-lista');
const ulPrimera = document.querySelector('.primera-lista');
//ulPrimera.appendChild(li);
//ulPrimera.appendChild(li);
//ulPrimera.insertBefore(li, ulPrimera.children[0]);

//Añadir elementos
body.appendChild(elemento1);
body.appendChild(br);
body.insertBefore(ulPrimera, body.children[1]);

