 let navbarDiv = document.querySelector('.navbar'); // menja pozadinu navbara kada skrolujemo na skrol
window.addEventListener('scroll',()=> {
    if(document.body.scrollTop > 40 || document.documentElement.scrollTop>40){
        navbarDiv.classList.add('navbar-cng');//dodaje klasu cng u navbar
    }else {
        navbarDiv.classList.remove('navbar-cng');
    }
});

const navbarCollapseDiv = document.getElementById('navbar-collapse');
const navbarShowBtn = document.getElementById('navbar-show-btn');
const navbarCloseBtn = document.getElementById('navbar-close-btn');
// prikazati navbar
navbarShowBtn.addEventListener('click', () => {
    navbarCollapseDiv.classList.add('navbar-collapse-rmw');
});
// zatvori navbar
navbarCloseBtn.addEventListener('click',()=>{
    navbarCollapseDiv.classList.remove('navbar-collapse-rmw');
});



// zaustavi tranziciju i animaciju tokom smanjenja prozora
let resizeTimer;
window.addEventListener('resize',()=>{
    document.body.classList.add("resize-animation-stoper");
    clearTimeout(resizeTimer);
    resizeTimer=setTimeout(()=>{
        document.body.classList.remove("resize-animation-stoper");
    },400);
});
// manjifik popuup
$(document).ready(function() {
    $('.parent-container').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        gallery:{
            enabled:true}
        // other options
      });
  });





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

