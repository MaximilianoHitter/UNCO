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





//trabajar siempre presentando el array asi funcan los filtros
/*<div class="producto">
                <div class="img">
                    <img src="" alt="">
                </div>
                <p class="infoProd">
                    <span class="tituloPro"></span>
                    <span class="tipoProd"></span>
                    <span class="piezasProd"></span>
                    <span class="desProd"></span>
                    <span class="precioProd"></span>
                </p>
                button falta
            </div>*/