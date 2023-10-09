
var searchTerm = encodeURIComponent(document.getElementById('searchInput').value);
function search() {
    var searchTerm = encodeURIComponent(document.getElementById('searchInput').value);
    window.location.href = 'BloodB.php?q=' + searchTerm;
}
