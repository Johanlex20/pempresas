
    document.getElementById("boton_minimenu").addEventListener("click", mostrar_menu);

    document.getElementById("mini_menu").addEventListener("click", ocultar_menu)

    nav = document.getElementById("nav");
    background_menu = document.getElementById("mini_menu");

    function mostrar_menu(){

        nav.style.right="0px";
        background_menu.style.display = "block";
    }

    function ocultar_menu(){
        
        nav.style.right="-250px";
        background_menu.style.display = "none";
    }