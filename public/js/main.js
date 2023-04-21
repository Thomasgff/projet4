//initialisation des datepicker moteur de recherche
$('#dateDebutSearch, #dateFinSearch').datepicker({
    autoclose: true
});




////////******BOUTON BACK TO TOP******////////
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
////////******FIN BOUTON BACK TO TOP******////////

///////*******DISPOS ANNONCE******///////
 
/*var availableDates = [
  "2023-01-18",
  "2023-04-18",
  "2023-04-19",
  "2023-04-21",
  "2023-04-22",
  "2023-04-23"
];*/

const myElement = document.getElementById('stockageDispos');
const availableDates = myElement.getAttribute('data-my-variable');
console.log(availableDates);

// Date minimum et maximum pour le checkout
const minCheckoutDate = new Date();
const maxCheckoutDate = new Date();
maxCheckoutDate.setDate(minCheckoutDate.getDate() + 28);

// Fonction pour formater une date en chaîne de caractères "yyyy-mm-dd"
function formatDate(date) {
  const year = date.getFullYear();
  const month = (date.getMonth() + 1).toString().padStart(2, '0');
  const day = date.getDate().toString().padStart(2, '0');
  return `${year}-${month}-${day}`;
}

function updateCheckoutDates(dateText) {
  console.log("fonction updateCheckout bien appelée. la date de chexckin est: "+ dateText);
  const checkinDate = $('#checkin').datepicker('getDate');
  console.log(checkinDate);
  const minCheckoutDate = new Date(checkinDate); // on initialise la date de checkout minimum avec la date de checkin
  console.log(minCheckoutDate);
  const dateIsAvailable = [];
  const possibleCheckout = new Date();
  //console.log(datesToDisable);

  // On récupère les dates à partir de la date de checkin jusqu'à la date de checkout maximum autorisée
  while (minCheckoutDate <= maxCheckoutDate) {
    const checkoutDateString = formatDate(minCheckoutDate);
    //console.log(checkoutDateString);
    if (availableDates.includes(checkoutDateString)) {
      // Si la date est disponible
      possibleCheckout.setDate(minCheckoutDate.getDate() + 1);
      const possibleCheckoutDateString = formatDate(possibleCheckout);
      console.log('checkout possible'+possibleCheckout);
      dateIsAvailable.push(possibleCheckoutDateString);
      console.log(dateIsAvailable);
    }else{
      break;
    }
    minCheckoutDate.setDate(minCheckoutDate.getDate() + 1);
  }

  $('#checkout').datepicker('destroy');
  $('#checkout').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
    beforeShowDay: function(date) {
      var dateString = $.datepicker.formatDate('yy-mm-dd', date);
      var dateOk = (dateIsAvailable.indexOf(dateString) !== -1);
      return [dateOk, ''];
    }
  });
  }

$(document).ready(function() {
  $('#checkin').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
    onSelect: function(dateText, inst){
      updateCheckoutDates(dateText);
    },
    beforeShowDay: function(date) {
      var dateString = $.datepicker.formatDate('yy-mm-dd', date);
      var dateIsAvailable = (availableDates.indexOf(dateString) !== -1);
      return [dateIsAvailable, ''];
    }
  }); 
});







