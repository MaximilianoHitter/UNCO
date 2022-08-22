<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/bootstrap-5.1.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/css/styles.css" />
    <script src="styles/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>

<body>
    <form action="../Controlador/verificaPass.php" method="POST" id="formulario" onsubmit="return validacion();">
        <div class="contenedor">
            <br>
            <h3>Member Login</h3>
            <div class="">
                <input type="email" class="form-control borde" id="email" placeholder="Username" name="email" required>
                <div class="emailV invalid-feedback" id="emailV">
                    Email no válido
                </div>
            </div>
            <br>
            <div class="">
                <input type="password" class="form-control borde" id="password" placeholder="Password" name="password" required>
                <div class="passV invalid-feedback" id="passV">
                    
                </div>
            </div>
            <br>
            <button type="submit" class="btn large btn-success" id="boton">Login</button>
            <!-- Submit button -->
            <!-- <button type="button" class="">Login</button> -->
        </div>
        </div>

    </form>
    <script>
        //mi validacion
        //selectores
        const email = document.getElementById('email');
        const emailV = document.getElementById('emailV');
        //console.log(emailV);
        const pass = document.getElementById('password');
        const passV = document.getElementById('passV');
        //console.log(password.value);
        const boton = document.getElementById('boton');
        boton.disabled = true;
        var arrayComprobado = [];
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        passRegex = /^[A-Za-z\s]+$/i;
        pass2Regex = /^[0-9]+$/i;
        if (localStorage.getItem('contenido')) {
            localStorage.removeItem('contenido');
        }


        email.addEventListener('change', (e) => {
            if (emailRegex.test(e.target.value)) {
                //console.log(e.target.value);
                //console.log('gut');
                let elemento = {
                    'email': 'true',
                    'contenido': e.target.value
                };
                localStorage.setItem('contenido', JSON.stringify(elemento));

                arrayComprobado = elemento;
                emailV.style.display = 'none';
                email.classList.add('gut');
                email.classList.remove('bad');
                //console.table(arrayComprobado);
            } else {
                //console.log('bad');
                emailV.style.display = 'block';
                email.classList.add('bad');
                email.classList.remove('gut');
            }
        })

        pass.addEventListener('change', (e) => {
            if (localStorage.getItem('contenido')) {
                let contenido = JSON.parse(localStorage.getItem('contenido'));
                let contenidoEmail = contenido.contenido.split('@');
                //console.log(contenidoEmail);
                contenido = contenidoEmail[0];
                //quitar numeros del contenido
                let contenidoFiltrado = contenido.split('');
                /* console.log('Contenido separado');
                console.log(contenidoFiltrado); */
                let contenidoNuevo = contenidoFiltrado.filter((elemento)=>{
                    if(isNaN(elemento)){
                        return(elemento);
                    }
                })
                /* console.log('Contenido nuevo');
                console.log(contenidoNuevo); */
                contenidoFiltrado = '';
                contenidoNuevo.forEach(element => {
                    contenidoFiltrado = contenidoFiltrado+element;
                });
                /* console.log('Contenido filtrado:');
                console.log(contenidoFiltrado); */

                let passWord = e.target.value;
                if (!passWord.includes(contenidoFiltrado)) {
                    //vamos bien
                    if (passWord.length >= 8) {
                        //vamos mejor
                        if (!passRegex.test(passWord) && !pass2Regex.test(passWord)) {
                            //alles gut
                            boton.disabled = false;
                            passV.style.display = 'none';
                            pass.classList.add('gut');
                            pass.classList.remove('bad');
                        } else {
                            //nope
                            passV.style.display = 'block';
                            passV.innerHTML = 'La contraseña no debe contener caracteres extraños y debe ser alfanumerica';
                            pass.classList.add('bad');
                            pass.classList.remove('gut');
                        }
                    } else {
                        //va peor
                        passV.style.display = 'block';
                        passV.innerHTML = 'La contraseña debe ser de al menos 8 caracteres';
                        pass.classList.add('bad');
                        pass.classList.remove('gut');
                    }
                } else {
                    //va mal
                    passV.style.display = 'block';
                    passV.innerHTML = 'La contraseña no debe incluir parte de mail';
                    pass.classList.add('bad');
                    pass.classList.remove('gut');
                }
            } else {
                passV.style.display = 'block';
                passV.innerHTML = 'Debe ingresar primero el usuario';
                pass.classList.add('bad');
                pass.classList.remove('gut');
            }
        });

        function validacion(){
            return(true);
        };

    </script>
</body>

</html>