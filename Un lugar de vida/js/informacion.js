var btnAbrirPopup = document.getElementById('abrir'),
    overlay = document.getElementById('overlay2'),
    popup = document.getElementById('ventana2'),
    btnCerrarPopup = document.getElementById('cerrar2');

btnAbrirPopup.addEventListener('click', function() {
    overlay.classList.add('active');
    popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(e) {
    e.preventDefault();
    overlay.classList.remove('active');
    popup.classList.remove('active');
});