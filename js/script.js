//Ejecutar función en el evento click
document.getElementById("btn_open").addEventListener("click", open_close_menu);

//Declaramos variables
var side_menu = document.getElementById("menu_side");
var btn_open = document.getElementById("btn_open");
var body = document.getElementById("body");

//Evento para mostrar y ocultar menú
    function open_close_menu(){
        body.classList.toggle("body_move");
        side_menu.classList.toggle("menu__side_move");
    }

//Si el ancho de la página es menor a 760px, ocultará el menú al recargar la página

if (window.innerWidth < 760){

    body.classList.add("body_move");
    side_menu.classList.add("menu__side_move");
}

//Haciendo el menú responsive(adaptable)

window.addEventListener("resize", function(){

    if (window.innerWidth > 760){

        body.classList.remove("body_move");
        side_menu.classList.remove("menu__side_move");
    }

    if (window.innerWidth < 760){

        body.classList.add("body_move");
        side_menu.classList.add("menu__side_move");
    }

});


// script.js

// Función para cargar "reservacion.html" en el iframe y ajustar su altura
function cargarReservacion() {
    const iframe = document.getElementById('iframe_reservacion');
    iframe.src = 'reservacion.html';
    
    // Cargar la página y ajustar la altura del iframe cuando esté completamente cargada
    iframe.onload = function() {
        const contenido = iframe.contentWindow.document.body;
        const alturaContenido = contenido.scrollHeight;
        iframe.style.height = alturaContenido + 'px';
    };
}

// Agregamos un evento click al enlace "Reservar Evento"
document.getElementById('reservar_evento').addEventListener('click', cargarReservacion);


// script.js

// Función para cargar "reservacion.html" en el iframe y ajustar su altura
function cargarCliente() {
    const iframe = document.getElementById('iframe_clientes');
    iframe.src = 'clientes.html';
    
    // Cargar la página y ajustar la altura del iframe cuando esté completamente cargada
    iframe.onload = function() {
        const contenido = iframe.contentWindow.document.body;
        const alturaContenido = contenido.scrollHeight;
        iframe.style.height = alturaContenido + 'px';
    };
}

// Agregamos un evento click al enlace "Reservar Evento"
document.getElementById('mostrar_cliente').addEventListener('click', cargarCliente);
