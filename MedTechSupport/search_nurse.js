
var searchTerm = encodeURIComponent(document.getElementById('searchInput').value);
function search() {
    var searchTerm = encodeURIComponent(document.getElementById('searchInput').value);
    window.location.href = 'nurse.php?q=' + searchTerm;
}

//search for small screen
var searchTerm = encodeURIComponent(document.getElementById('searchInput1').value);
function search1() {
    var searchTerm = encodeURIComponent(document.getElementById('searchInput1').value);
    window.location.href = 'nurse.php?q=' + searchTerm;
}
