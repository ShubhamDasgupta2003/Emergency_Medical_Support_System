let menu=document.querySelector('#menu-btn');
let navbar=document.querySelector('.navbar');

menu.onclick=()=>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll=()=>{
    menu.classList.remove('fa-times');
    menu.classList.remove('active');
}




// for nav link

// JavaScript
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.navbar a');

// Highlight the active navigation link on scroll and click
window.addEventListener('scroll', highlightActiveLink);
navLinks.forEach(link => {
    link.addEventListener('click', function (event) {
        event.preventDefault();
        const targetSection = document.querySelector(link.getAttribute('href'));
        if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
        }
    });
});


