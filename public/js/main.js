//initialisation des datepicker
$('.datepicker').datepicker({
    autoclose: true
});


////////******BOUTTON BACK TO TOP******////////
//Obtenir le boutton
let mybutton = document.getElementById("btn-back-to-top");

// Montrer le boutton quand l'utilisateur scrolle plus de 1000px
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 1000 ||
    document.documentElement.scrollTop > 1000
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// Quand l'utilisateur clique sur le boutton on retourne en haut de la page
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
////////******FIN BOUTTON BACK TO TOP******////////