const amb_no = document.getElementById('amb_no');
const amb_no_notice = document.querySelector('#amb_no_validation');
console.log(amb_no_notice.value);


amb_no.addEventListener('change',()=>{
    let num = amb_no.value;
    if(isValidVehicleNumberPlate(num)=="false")
    {
        isactive();
    }
    else
    {
        isinactive();
    }

});


// Indian Vehicle Number Plate
function isValidVehicleNumberPlate(NUMBERPLATE) {
    let regex = new RegExp(/^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$/);
    if (NUMBERPLATE == null) {
        return "false";
    }
    if (regex.test(NUMBERPLATE) == true) {
        return "true";
    }
    else {
        return "false";
    }
}


function isactive()
{
    amb_no_notice.classList.remove('validation-inactive');
    amb_no_notice.classList.add('validation-active');
}
function isinactive()
{
    amb_no_notice.classList.add('validation-inactive');
    amb_no_notice.classList.remove('validation-active');
}

