
 let navbarDiv = document.querySelector('.header-navbar'); // menja pozadinu navbara kada skrolujemo na skrol
 window.addEventListener('scroll',()=> {
     if(document.body.scrollTop > 40 || document.documentElement.scrollTop>40){
         navbarDiv.classList.add('navbar-cng');//dodaje klasu cng u navbar
     }else {
         navbarDiv.classList.remove('navbar-cng');
     }
 });

let menu=document.querySelector('#menu-btn');
let navbar=document.querySelector('.header-navbar .navbar');

menu.onclick = ()=>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
 
};

window.onscroll = ()=>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

let homesection=document.querySelector(".home").clientHeight;
document.querySelector(".featured-places").style.marginTop=homesection-300+"px";

let feturedchild = document.querySelector(".featured-places .box-container").childElementCount;
let children = document.querySelector(".featured-places .box-container").children;
for (let i = 0; i < feturedchild; i++) {
    children.item(i).style.display = "inline-block";
}



document.getElementById('datum').addEventListener("change", function() {
    var input = this.value;
    var dateEntered = new Date(input);
    console.log(input); 
    console.log(dateEntered); 
    var today= new Date();
    console.log(today);
    if(dateEntered<today){
        alert("Pogresan datum");
    }
});

