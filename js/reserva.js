
function colores() {


    var celdas = document.getElementById("tablaDetalle").getElementsByTagName("td");
    for (var i = 0; i < celdas.length; i++) {
        if (celdas.item(i).textContent === 'Ocupado') {
            celdas.item(i).style.color = "red";
            celdas.item(i).style.fontWeight = "700";
            celdas.item(i).style.borderWidth = "3px";
        } else if(celdas.item(i).textContent === 'Libre') {
            celdas.item(i).style.color = "#067a14";
            celdas.item(i).style.fontWeight = "700";
            celdas.item(i).style.borderWidth = "3px";


        }
    }


}

window.onload = colores;

