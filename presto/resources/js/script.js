window.onload = function() {
    applyHomepageStyle();
};
/*
function applyHomepageStyle() {
    const navElement = document.querySelector('.Home');
    const searchForm = document.querySelector('.search');

    if (window.location.pathname === '/') {
        navElement.classList.add('home-nav');
        if (searchForm) {
            searchForm.style.display = 'none';
        }

        const elementToRemove = document.querySelector('.search');
        if (elementToRemove) {
            elementToRemove.remove();
        }
    } else {
        navElement.classList.remove('home-nav');
        if (searchForm) {
            searchForm.style.display = 'none';
        }
    }
}
*/

function applyHomepageStyle() { // Remove navbar
    const navElement = document.querySelector('.Home');

    if (window.location.pathname === '/') {
        if (navElement) {
            navElement.style.display = 'none';
        }
    }
}

import $ from 'jquery';

$("#switch").on("click", function() {
    if ($("#fullpage").hasClass("night")) {
        $("#fullpage").removeClass("night");
        $("#switch").removeClass("switched");
    } else {
        $("#fullpage").addClass("night");
        $("#switch").addClass("switched");
    }
});



let isNight = false;

function toggleDayNight() {
    const switchButton = document.getElementById('switch');

    const circle = document.getElementById('circle');

    if (isNight) {
        circle.style.left = '10px';
        isNight = false;
    } else {
        circle.style.left = '160px';
        isNight = true;
    }
}



console.log('ciaoo');
