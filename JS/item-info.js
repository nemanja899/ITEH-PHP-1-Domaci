var destinationImg = document.getElementById("DestinationImg");
var smallImg = document.getElementsByClassName("small-img");

Array.from(smallImg).forEach(function (img) {
  img.addEventListener("click", function (e) {
    destinationImg.src = img.getAttribute("src");
  });
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

dateTo = document.getElementById("date-to");
if (dateTo != null) {
  dateTo.addEventListener("change", function () {
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
dateFrom = document.getElementById("date-from");
if (dateFrom != null) {
  dateFrom.addEventListener("change", function () {
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
