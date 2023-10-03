const search_btn = document.getElementById('search_amb');
const search_value = document.getElementById('search_val');

search_btn.addEventListener('click',()=>{

    let searchbar_text = search_value.value;
    window.location.href = "ambulance_booking.php?q="+searchbar_text;
})
