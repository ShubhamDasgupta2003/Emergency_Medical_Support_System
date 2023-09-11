const adv_arr = ["images/Blood_Bank.jpg","images/Blood_Bank.jpg","images/Blood_Bank.jpg"]

let left = document.getElementById('lbtn');
let right = document.getElementById('rbtn');
const advtdispl = document.getElementById('advtdisplay');

console.log(left,right);
let i = 0;
right.addEventListener('click',()=>{
    advtdispl.classList.toggle('fadein');
    advtdispl.classList.toggle('fadeout');
    let len = adv_arr.length-1;
    let ind = i%len+1;
    advtdispl.src = adv_arr[ind];
    i++;
});
left.addEventListener('click',()=>{
    advtdispl.classList.toggle('fadein');
    advtdispl.classList.toggle('fadeout');
    let len = adv_arr.length-1;
    if(i==0)
    {
        i = len-1;
    }
    i--;
    let ind = i%len+1;
    advtdispl.src = adv_arr[ind];
    console.log(ind,i);
});

let index = 0;
setInterval('imagechanger()',3000);

function imagechanger()
{
    if(index<=adv_arr.length-1)
    {
        advtdispl.classList.toggle('fadein');
        advtdispl.classList.toggle('fadeout');
        advtdispl.src = adv_arr[index];
    }
    else
    {
        index = 0;
    }
    index++;
}

