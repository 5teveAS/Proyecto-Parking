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

document.onclick = function (e) {
  
  if (e.target.id !== 'mySidenav' &&
    e.target.id !== 'openSideMenu' &&
    e.target.id !== 'nombreUsuario' &&
    e.target.id !== 'form' &&
    e.target.id !== 'inUser' &&
    e.target.id !== 'inPass'&&
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
