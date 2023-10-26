var amb_status = document.querySelectorAll('#card-status');
var drv_stat = document.querySelector('.status');

for(let i=0;i<amb_status.length;i++)
{
    if(amb_status[i].textContent == "active")
    {
        amb_status[i].classList.add('stat-active');
    }
    else
    {
        amb_status[i].classList.add('stat-busy');
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