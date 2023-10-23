var secs=0;
var mins = 0;
var hrs = 0;
var interval = 1000;
var timerDisplay = document.getElementById('timer');
const endBtn = document.getElementById('endride');

const urlParams = new URLSearchParams(window.location.search);
var inv_id = urlParams.get('inv');

let timer = setInterval(countUp,interval);

function countUp()
{
    secs+=1;
    if(secs>9)
    {
        mins+=1;
        secs=0;
    }
    if(mins>59)
    {
        hrs+=1;
        mins=0;
    }
    timerDisplay.textContent = hrs+" Hrs: "+mins+" mins: "+secs+" secs ";
}

function pause()
{
    clearInterval(timer);
}

endBtn.addEventListener("click",()=>{
    pause();
    window.location.href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/Ambulance Service/ride_end.php?hs="+hrs+"&ms="+mins+"&sc="+secs+"&inv="+inv_id;
})