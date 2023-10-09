const search_btn = document.getElementById('search_bld');
const search_value = document.getElementById('search_val');

search_btn.addEventListener('click',()=>{

    let searchbar_text = search_value.value;
    window.location.href = "BloodB.php?q="+searchbar_text;
})
