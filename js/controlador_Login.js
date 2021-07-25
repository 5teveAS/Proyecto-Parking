
function iniciarSesion() {
    var cajaUser = document.getElementById('inUser');
    var cajaPass = document.getElementById('inPass');

    var user = cajaUser.value;
    var pass = cajaPass.value;
    /*Comentario para probar git*/ 
    $.ajax({
        type: "POST",
        url: "php/modelo_Login.php",
        data: { user: user, pass: pass },
        success: function (respuesta) {

            var respuestaJason = JSON.parse(respuesta); 

            if(respuestaJason.success == '1'){
                $(location).attr('href', 'https://www.google.com');
                
            }else if(respuestaJason.success == '0'){
                alert ('Datos Incorrectos');
            }  
        },
        error: function(){
            alert("Se produjo un problema al ingresar");
        }

    });

}