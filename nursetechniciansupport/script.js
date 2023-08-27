console.log("from script file");
var items = document.getElementsByClassName('segmented-item');
for (var i = 0; i < items.length; i++) {
  items[i].addEventListener('click', function() {
    // Remove 'active' class from all items
    for (var j = 0; j < items.length; j++) {
      items[j].classList.remove('active');
    }
    // Add 'active' class to the clicked item
    this.classList.add('active');
  });
}