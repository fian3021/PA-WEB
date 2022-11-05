const menuToggle = document.querySelector('.menu-toggle input');
const nav = document.querySelector('.menu-1');

menuToggle.addEventListener('click', function(){
    nav.classList.toggle('slide');
});