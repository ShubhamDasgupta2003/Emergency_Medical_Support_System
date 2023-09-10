const pswd_Box = document.getElementById('pswd');
const cnf_pswd_Box = document.getElementById('cnf-pswd');
const sbmt_btn = document.getElementById('sbmt-form');

sbmt_btn.addEventListener('click',()=>{
    if((pswd_Box.value != cnf_pswd_Box.value))
    {
        alert("Enter your password correctly!");
    }
})
