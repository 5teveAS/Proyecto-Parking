
function iniciarSesion() {
    var cajaUser = document.getElementById('inUser');
    var cajaPass = document.getElementById('inPass');

    var user = cajaUser.value;
    var pass = cajaPass.value;
    /*Comentario probar el github*/ 
    $.ajax({
        type: "POST",
        url: "php/modelo_Login.php",
        data: { user: user, pass: pass },
        success: function (respuesta) {

            var respuestaJason = JSON.parse(respuesta); 

            if(respuestaJason.success == '1'){
                $(location).attr('href', 'php/modelo_reservas.php');
                
            }else if(respuestaJason.success == '0'){
                alert ('Datos Incorrectos');
            }  
        },
        error: function(){
            alert("Se produjo un problema");
        }

    });

}


function registrar() {
    var cajaUser = document.getElementById('inUser');
    var cajaPass = document.getElementById('inPass');

    var user = cajaUser.value;
    var pass = cajaPass.value;

    
    $.ajax({
        type: "POST",
        url: "php/modelo_registrar.php",
        data: { user: user, pass: pass },
        success: function (respuesta) {
            var form = document.getElementById('form'); 
            var h4 = document.createElement("h4");
            var contenido = document.createTextNode("Usuario registrado");
            h4.appendChild(contenido);
            form.appendChild(h4);
            h4.style.alignContent(center);
        }
    });
}