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

// search bar js starts here 
// card-name

// JavaScript code 
function search_hos_name() { 
	let input = document.getElementById('searchbar').value 
	input=input.toLowerCase(); 
	let x = document.getElementsByClassName('card'); 
	
	for (i = 0; i < x.length; i++) { 
		if (!x[i].innerHTML.toLowerCase().includes(input)) { 
			x[i].style.display="none"; 
		} 
		else { 
			x[i].style.display="block";				 
		} 
	} 
} 

