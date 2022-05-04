// Toggle menu mobile
const menuMobileButton = document.getElementById('menuMobileButton')
const menuContainer = document.getElementById('headerMenu')
menuMobileButton.addEventListener('click', (e) => {
  e.preventDefault()
  menuContainer.classList.toggle('open')
})

// Dealy function
function delay(callback, ms) {
  var timer = 0
  return function() {
    var context = this, args = arguments
    clearTimeout(timer)
    timer = setTimeout(function () {
      callback.apply(context, args)
    }, ms || 600)
  }
}

// Search input
const searchInput = document.getElementById('navbarSearch')
searchInput.addEventListener('click', delay((e) => {
  const inputValue = searchInput.val()
  const searchResponse = document.getElementsByClassName('search-response')
  if(inputValue.length >= 3){
    searchResponse.html('Recherche en cours...')
    fetch('?action=search',{
      method: 'POST',
      headers: new Headers(),
      mode: 'cors',
      body: {value: inputValue },
      cache: 'default' })
        .then(function(response) {
          return searchResponse.html(response)
        }).catch(err => searchResponse.html(err))
  } else {
    searchResponse.html('')
  }
}))