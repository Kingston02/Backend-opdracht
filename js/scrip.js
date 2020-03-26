

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
var beschrijving = document.getElementById('beschrijving');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    //ev.target.classList.toggle('checked');
    ev.target.style.height = "400px";
    ev.target.style.backgroundColor = "#f0f0f0";
    beschrijving.style.display = 'inline';
  }
}, false);