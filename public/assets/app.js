// assets/app.js
const burgerOverlay = document.querySelector('#burger-overlay');
const burgerIcon = document.querySelector('#burger-icon');
const menuBurgerNav = document.querySelector('#menu-burger-nav');

burgerIcon.addEventListener('click', () => {
    burgerOverlay.classList.add('burger-overlay--active');
    menuBurgerNav.classList.add('menu-burger-nav--active');
});

burgerOverlay.addEventListener('click', () => {
    burgerOverlay.classList.remove('burger-overlay--active');
    menuBurgerNav.classList.remove('menu-burger-nav--active');
});