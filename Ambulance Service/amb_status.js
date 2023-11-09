var amb_status = document.querySelectorAll('#card-status');
var drv_stat = document.querySelector('.status');
var busy_btn = document.querySelectorAll("#book_btn");
var busy_card = document.querySelectorAll("#amb_card");

for(let i=0;i<amb_status.length;i++)
{
    if(amb_status[i].textContent == "active")
    {
        amb_status[i].classList.add('stat-active');
    }
    else
    {
        amb_status[i].classList.add('stat-busy');
        // busy_btn[i].disabled = true;
        // busy_btn[i].style.backgroundColor="grey";
        busy_card[i].style.display = "none";
    }
}

if(drv_stat.textContent == "active")
{
    drv_stat.classList.add('status-active');
}
else
{
    drv_stat.classList.add('status-inactive');
}