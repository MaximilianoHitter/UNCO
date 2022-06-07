//crear carrito en storage
let arrayCarrito = [];
localStorage.setItem('carrito', JSON.stringify(arrayCarrito));

//carga de datos en localStorage
//producto 1
let objDatos = {
    img:'./idea2/img/productos/rompecabezas1.jpg',
    tituloProd:'Taj Mehol',
    marcaProd:'ravensburger',
    tipoProd:'rompecabezas',
    piezasProd:5000,
    desProd:'Un bello retrato del Taj Mahal',
    precioProd:3000
};
localStorage.setItem('prod1', JSON.stringify(objDatos));
//producto 2
objDatos = {
    img:'./idea2/img/productos/rompecabezas2.jpg',
    tituloProd:'Fondo Marino',
    marcaProd:'ravensburger',
    tipoProd:'rompecabezas',
    piezasProd:3000,
    desProd:'Unos cuantos peces dando vueltas',
    precioProd:1500
};
localStorage.setItem('prod2', JSON.stringify(objDatos));
//producto 3
objDatos = {
    img:'./idea2/img/productos/rompecabezas3.jpg',
    tituloProd:'Selvachu Pichu',
    marcaProd:'ravensburger',
    tipoProd:'rompecabezas',
    piezasProd:2500,
    desProd:'Las frondosas selvas del mundo',
    precioProd:500
};
localStorage.setItem('prod3', JSON.stringify(objDatos));
//producto 4
objDatos = {
    img:'./idea2/img/productos/rompecabezas4.jpg',
    tituloProd:'Puente Iluminado',
    marcaProd:'ravensburger',
    tipoProd:'rompecabezas',
    piezasProd:3000,
    desProd:'Un bonito puente iluminado',
    precioProd:1500
};
localStorage.setItem('prod4', JSON.stringify(objDatos));
//producto 5
objDatos = {
    img:'./idea2/img/productos/rompecabezas5.jpg',
    tituloProd:'Una noche barqueada',
    marcaProd:'ravensburger',
    tipoProd:'rompecabezas',
    piezasProd:5500,
    desProd:'Como la noche estrellada pero con barcos',
    precioProd:1500
};
localStorage.setItem('prod5', JSON.stringify(objDatos));
//producto 6
objDatos = {
    img:'./idea2/img/productos/rompecabezas6.jpg',
    tituloProd:'Las cuatro estaciones',
    marcaProd:'anatolian',
    tipoProd:'rompecabezas',
    piezasProd:1000,
    desProd:'Como si se representara la obra de Vivaldi en un cuadro',
    precioProd:1500
};
localStorage.setItem('prod6', JSON.stringify(objDatos));
//producto 7
objDatos = {
    img:'./idea2/img/productos/rompecabezas7.jpg',
    tituloProd:'Coliseo Colisionado',
    marcaProd:'anatolian',
    tipoProd:'rompecabezas',
    piezasProd:10000,
    desProd:'Coliseo con refacciones',
    precioProd:1500
};
localStorage.setItem('prod7', JSON.stringify(objDatos));
//producto 8
objDatos = {
    img:'./idea2/img/productos/rompecabezas8.jpg',
    tituloProd:'Paseo Antiguo',
    marcaProd:'anatolian',
    tipoProd:'rompecabezas',
    piezasProd:800,
    desProd:'Un agradable y colorido paseo',
    precioProd:1500
};
localStorage.setItem('prod8', JSON.stringify(objDatos));
//producto 9
objDatos = {
    img:'./idea2/img/productos/rompecabezas9.jpg',
    tituloProd:'Barquillo',
    marcaProd:'anatolian',
    tipoProd:'rompecabezas',
    piezasProd:500,
    desProd:'Un paseo en barco',
    precioProd:1500
};
localStorage.setItem('prod9', JSON.stringify(objDatos));
//producto 10
objDatos = {
    img:'./idea2/img/productos/rompecabezas10.jpg',
    tituloProd:'Hansel y Roberto',
    marcaProd:'anatolian',
    tipoProd:'rompecabezas',
    piezasProd:2500,
    desProd:'Cuidado Hansel, esta no es Gretel',
    precioProd:1500
};
localStorage.setItem('prod10', JSON.stringify(objDatos));
 
//Obtener los datos
let arrayProductos = [];
let condition = true;
let contador = 0;
let str = '';
let item = null;
while (condition) {
    str = 'prod';
    contador++;
    str = str + contador;
    item = localStorage.getItem(str);
    if(item != null){
        arrayProductos[contador] = JSON.parse(item);
    }else{
        condition = false;
    }
}
//console.table(arrayProductos);

//mezclar array
arrayProductos.sort(()=> Math.random() - 0.5);

//seleccinar al padre
const catalogoItems = document.getElementsByClassName('catalogoItems')[0];
//console.log(catalogoItems);

//Crear y añadir las tarjetas
let i = 0;
arrayProductos.forEach(element => {
    //div de tarjeta
    let producto = document.createElement('div');
    producto.classList.add('productoCat');
    //div de la imagen
    let imagenDiv = document.createElement('div');
    imagenDiv.classList.add('img');
    //imagen del div
    let imagen = document.createElement('img');
    imagen.srcset = element.img;
    //añadir la imagen al div
    imagenDiv.appendChild(imagen);
    //creacion del parrafo
    let parrafoInfo = document.createElement('p');
    parrafoInfo.classList.add('infoProd');
    //span de titulo
    let spanTitulo = document.createElement('p');
    spanTitulo.classList.add('tituloProd');
    spanTitulo.innerHTML = element.tituloProd;
    parrafoInfo.appendChild(spanTitulo);
    //parrafo para marca y tipo
    let parrafoMarca = document.createElement('p');
    parrafoMarca.classList.add('pMarca');
    //span de marca
    let spanMarca = document.createElement('span');
    spanMarca.classList.add('marcaProd');
    let primerLetra = element.marcaProd.charAt(0).toUpperCase();
    let cadenaCompleta = primerLetra + element.marcaProd.substring(1, element.marcaProd.length);
    spanMarca.innerHTML = cadenaCompleta;
    parrafoMarca.appendChild(spanMarca);
    //span de tipo
    let spanTipo = document.createElement('span');
    spanTipo.classList.add('tipoProd');
    let primerLetraTipo = element.tipoProd.charAt(0).toUpperCase();
    let cadenaCompletaTipo = ` - ` + primerLetraTipo + element.tipoProd.substring(1, element.tipoProd.length);
    spanTipo.innerHTML = cadenaCompletaTipo;
    parrafoMarca.appendChild(spanTipo);
    parrafoInfo.appendChild(parrafoMarca);
    //span de piezas
    let spanPiezas = document.createElement('p');
    spanPiezas.classList.add('piezasProd');
    spanPiezas.innerHTML = `Piezas: ` + element.piezasProd;
    parrafoInfo.appendChild(spanPiezas);
    //span de descripcion
    let spanDes = document.createElement('p');
    spanDes.classList.add('desProd');
    spanDes.innerHTML = `Descripción: \n` + element.desProd;
    parrafoInfo.appendChild(spanDes);
    //span de precio
    let spanPrecio = document.createElement('p');
    spanPrecio.classList.add('precioProd');
    spanPrecio.innerHTML = `Precio: $` + element.precioProd;
    parrafoInfo.appendChild(spanPrecio);
    //añado el parrafo
    producto.appendChild(imagenDiv);
    producto.appendChild(parrafoInfo);
    //añadir botoncito
    let boton = document.createElement('button');
    boton.classList.add('comprar');
    boton.classList.add(`${i}`);
    //let datos = JSON.stringify(element);
    boton.addEventListener('click', (e) => {
        console.log(e.path[0].classList[1]);
        let datos = arrayProductos[e.path[0].classList[1]];
        let arrayCarrito = JSON.parse(localStorage.getItem('carrito'));
        arrayCarrito.push(datos);
        localStorage.setItem('carrito', JSON.stringify(arrayCarrito));
        console.table(arrayCarrito);
    })
    boton.innerHTML = '¡Comprar!';
    producto.appendChild(boton);
    //añado el producto
    catalogoItems.appendChild(producto);
    i++;
});

//parte del carrito
const carritoItems = document.getElementsByClassName('carritoItems');
//borrar el contenido del carrito
function limpiarHTMLCarrito(){
    while(carritoItems.firstChild){
        carritoItems.removeChild(carritoItems.firstChild);
    }
}

function cargarCarrito(){
    limpiarHTMLCarrito();
    let arrayCarrito = localStorage.getItem('carrito');
    if(arrayCarrito.length = 0){
        let vacio = document.createElement('p');
        vacio.innerHTML = '¡Aún no tiene nada en su carrito!';
    }else{
        
    }
}