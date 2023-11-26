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


console.log('hii.');