const locationBtn = document.getElementsByClassName('get-location');
const locationWin = document.getElementById('loc-win');
const dismissBtn = document.getElementById('dismiss');
const root = document.documentElement;
const loginStats = document.getElementById('session_val').value;
console.log(loginStats);

// console.log(locationWin);

for(let i=0; i<locationBtn.length; i++)
{
    locationBtn[i].addEventListener('click',openPopup)
}

dismissBtn.addEventListener('click',closePopup);

function openPopup()
{
    if(loginStats==1)
    {
        locationWin.style.display = 'flex';
        // document.body.scrollTop = 0;
        window.location.href = "#";
        // document.documentElement.scrollTop = 0;
        document.body.classList.add("disable-scroll");
        root.classList.add("disable-scroll");
    }
    else
    {
        alert("Please Login to get services nearest to you!");
    }
}

function closePopup()
{
    locationWin.style.display = 'none';
    document.body.classList.remove("disable-scroll");
    root.classList.remove("disable-scroll");
}

// ================== Reverse Geocoding using Pincode =========================

const rev_btn = document.getElementById('pin-apply');
let pincode = document.getElementById('zipcode');
const loc_txt = document.getElementById('location-txt');
console.log(pincode);

api_key = "ee2dfca941774c139225977bbddebb90";

rev_btn.addEventListener("click", ()=>{
    let pincd = pincode.value;
    fetch('https://api.opencagedata.com/geocode/v1/json?q='+pincd+'&key='+api_key)
    .then(response=>(response.json()))
    .then(result=>{
        let details = result.results[0];
        // console.log(result.results);
        let loc_txt = details['formatted'];
        let loc_geometry = details['geometry'];
        let latitude = loc_geometry['lat'];
        let longitude = loc_geometry['lng'];
        // console.log(latitude,longitude);

        document.cookie = "lat_in_use= "+latitude;
        document.cookie = "lon_in_use= "+longitude;
        document.cookie = "address_in_use= "+loc_txt;
        document.cookie = "loc_modify= "+true;
        window.location.reload();
    })
}) 

// ================== Geocoding using Lat & Lon =========================

const btn_loc = document.getElementById('det-location');

function onSuccess(position)
{
    let {latitude,longitude} = position.coords;
    console.log(latitude,longitude);
    document.cookie = "lat_in_use= "+latitude;
    document.cookie = "lon_in_use= "+longitude;
    fetch('https://api.opencagedata.com/geocode/v1/json?q='+latitude+','+longitude+'&key='+api_key)
    .then(response=>(response.json())).then(result=>{
        let details = result.results[0];
        let loc_txt = details['formatted'];
        document.cookie = "address_in_use= "+loc_txt;
        document.cookie = "loc_modify= "+true;
        window.location.reload();
    })
}

function onError(error)
{
    console.log(error);
}

btn_loc.addEventListener("click", ()=>{
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(onSuccess,onError);
    }
    else
    {
        btn_loc.innerText = "Geoloaction not supported";
    }
})