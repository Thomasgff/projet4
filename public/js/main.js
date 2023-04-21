
//initialisation des datepicker moteur de recherche
$('#dateDebutSearch, #dateFinSearch').datepicker({
  autoclose: true
});

////////******BOUTON BACK TO TOP******////////
//Obtenir le bouton
let mybutton = document.getElementById("btn-back-to-top");

// Montrer le bouton quand l'utilisateur scrolle plus de 1000px
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
// Quand l'utilisateur clique sur le bouton on retourne en haut de la page
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
////////******FIN BOUTON BACK TO TOP******////////






  






