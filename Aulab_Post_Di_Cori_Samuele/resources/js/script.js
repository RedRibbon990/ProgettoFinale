document.addEventListener('DOMContentLoaded', function () {

    // Text for inputbox
    var radioButtons = document.getElementsByName('variable');
    var additionalField = document.getElementById('additionalField');

    radioButtons.forEach(function (radio) {
        radio.addEventListener('change', function () {
            if (document.getElementById('otherGender').checked) {
                additionalField.style.display = 'block';
            } else {
                additionalField.style.display = 'none';
            }
        });
    });

    // Aggiungi qui altre funzioni o chiamate se necessario
});

// Hide navbar
document.addEventListener('DOMContentLoaded', function () {
    // Verifica se l'URL contiene 'login' o 'register'
    if (window.location.href.includes('login') || window.location.href.includes('register')) {
        // Ottieni l'elemento della navbar
        var navbar = document.getElementById('nav');

        if (navbar) {
            navbar.style.display = 'none';
        }
    }
});


console.log('hii.');