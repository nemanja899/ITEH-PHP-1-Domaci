// menja pozadinu navbara kada skrolujemo na skrol
window.addEventListener("scroll", () => {
  let login = document.getElementById("login");
  let navbarDiv = document.querySelector(".header-navbar");
  if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
    navbarDiv.classList.add("navbar-cng"); //dodaje klasu cng u navbar
    if (login != null) {
      login.style.display = "none";
    }
  } else {
    navbarDiv.classList.remove("navbar-cng");
    if (login != null) {
      login.style.display = "inline-block";
    }
  }
});

let menu = document.querySelector("#menu-btn");
let navbar = document.querySelector(".header-navbar .navbar");

menu.onclick = () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
};

window.onscroll = () => {
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
};

let homesection = document.querySelector(".home").clientHeight;
document.querySelector(".featured-places").style.marginTop =
  homesection - 300 + "px";
let date = document.getElementById("datum");
if (date != null) {
  date.addEventListener("change", function () {
    var input = this.value;
    var dateEntered = new Date(input);
    console.log(input);
    console.log(dateEntered);
    var today = new Date();
    console.log(today);
    if (dateEntered < today) {
      alert("Pogresan datum");
    }
  });
}

$(".dropbtn").click(function dropdown() {
  document.getElementById("myDropdown").classList.toggle("show");
});

// Close the dropdown if the user clicks outside of it
