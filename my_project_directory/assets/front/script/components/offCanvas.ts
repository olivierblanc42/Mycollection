const faList = document.querySelector(".fa-list");

faList.addEventListener("click", function() {

    const offcanvas = document.querySelector(".container-off")
    const active = offcanvas.classList.contains('active');

    if (offcanvas) {
        if (!active) {
            offcanvas.classList.add('active')
        } 
    }

});

const closeCross = document.querySelector(".close");

closeCross.addEventListener("click", function() {

    const offcanvas = document.querySelector(".container-off")
    const active = offcanvas.classList.contains('active');

    if (offcanvas) {
        if (active) {
            offcanvas.classList.remove('active')

        }
    }

});

const closeOffCanvas = document.querySelector(".container-off");
closeOffCanvas.addEventListener("click", function () {

    const offcanvas = document.querySelector(".container-off")
    const active = offcanvas.classList.contains('active');

    if (offcanvas) {
        if (active) {
            offcanvas.classList.remove('active')

        }
    }

});

const offCanvas = document.querySelector(".offcanvas");
offCanvas.addEventListener("click", (event)=> {
    event.stopPropagation();

})


