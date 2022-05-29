// const axios = require("axios");

// Toggle menu mobile
const menuMobileButton = document.getElementById('menuMobileButton')
const burgerMenu = document.querySelectorAll('.burger-menu');
const menuMobile = document.getElementById('menuMobileContent')
menuMobileButton.addEventListener('click', (e) => {
  e.preventDefault()
  if (menuMobile.classList.contains("open")) {
    menuMobile.classList.remove('open')
    burgerMenu.forEach(el => {el.classList.remove('open')})
    document.body.style.overflow = "auto";
  } else {
    document.body.style.overflow = "hidden";
    burgerMenu.forEach(el => {el.classList.add('open')})
    menuMobile.classList.add('open')
  }
})

// // Dealy function
// function delay(callback, ms) {
//   var timer = 0
//   return function() {
//     var context = this, args = arguments
//     clearTimeout(timer)
//     timer = setTimeout(function () {
//       callback.apply(context, args)
//     }, ms || 600)
//   }
// }
//
// // Search input
// const searchInput = document.getElementById('navbarSearchInput')
// searchInput.addEventListener('keyup', delay((event) => {
//   const inputValue = event.target.value;
//   const searchResponse = document.getElementById('searchResponseDesktop')
//   if(inputValue.length >= 3){
//     searchResponse.innerHTML = '<div>Recherche en cours...</div>';
//
//     axios.post('?action=search',{value: inputValue})
//         .then(function(response) {
//           return searchResponse.innerHTML(response)
//         }).catch(err => searchResponse.innerHTML = '')
//   } else {
//     searchResponse.innerHTML = ''
//   }
//
// }))