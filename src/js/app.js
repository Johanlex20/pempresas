
    document.addEventListener('DOMContentLoaded', function(){
        eventListeners();
    });

    function eventListeners(){
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenu.addEventListener('click', navegacionResponsive);
    }
    function navegacionResponsive(){
        const navegacion = document.querySelector('.navegacion');//funcion para desplegar el menu responsive

        if(navegacion.classList.contains('mostrar')){
            navegacion.classList.remove('mostrar');
        } else {
            navegacion.classList.add('mostrar');
        }
    }