const locationBtn = document.getElementsByClassName('get-location');
const locationWin = document.getElementById('loc-win');
const dismissBtn = document.getElementById('dismiss');
console.log(locationWin);

for(let i=0; i<locationBtn.length; i++)
{
    locationBtn[i].addEventListener('click',openPopup)
}

dismissBtn.addEventListener('click',closePopup);

function openPopup()
{
    locationWin.style.display = 'flex';
    // document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function closePopup()
{
    locationWin.style.display = 'none';
}