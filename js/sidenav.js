function openNav() {


  if (innerWidth < 630) {

    document.getElementById("mySidenav").style.width = "100%";

    document.getElementById("main").style.marginRight = "100%";

  } else {

    document.getElementById("mySidenav").style.width = "350px";
    document.getElementById("main").style.marginRight = "350px";

  }

  document.body.style.backgroundColor = "rgba(0,0,0,0.2)";
}


const prueba = document.querySelector('#main');
document.addEventListener('click', function (e) {

  const mensajeDiv = document.createElement('DIV');
  console.log(e.target.value);
  if (e.target.type === 'button') {
    console.log(e.target.type);
    const alerta = document.querySelector('.mensajediv');
    if (alerta) {
      mensajeDiv.remove();
      console.log('ya existe');
      return;
    } else {
      const mensajeAlerta = document.createElement('P');//crear un parrafo en javascript
      mensajeAlerta.textContent = '';
      mensajeAlerta.textContent = '¡Antes de reservar inicia sesion o registrate!';
      mensajeAlerta.classList.add('mensajealert');
  
      mensajeDiv.classList.add('mensajediv');
  
      mensajeDiv.appendChild(mensajeAlerta);
  
      document.querySelector('#mySidenav').appendChild(mensajeDiv);
      setTimeout(() => {
        mensajeDiv.remove();
      }, 3000);
    }
   
  }
 

} 
);

document.onclick = function (e) {

  const botonsillo = document.querySelector('#openSideMenu');


  if (
    e.target.id !== 'botonAbrir' &&
    e.target.id !== 'mySidenav' &&
    e.target.id !== 'openSideMenu' &&
    e.target.id !== 'nombreUsuario' &&
    e.target.id !== 'form' &&
    e.target.id !== 'inUser' &&
    e.target.id !== 'inPass' &&
    e.target.id !== 'labelCheck' &&
    e.target.id !== 'submit' &&
    e.target.id !== 'psw' &&
    e.target.id !== 'checkbox') {

    closeNav();
  }

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginRight = "0";
  document.body.style.backgroundColor = "white";
}
