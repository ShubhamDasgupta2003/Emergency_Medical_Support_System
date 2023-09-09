const adv_arr = ["https://m.media-amazon.com/images/I/51DWgNo1fdL._SX3000_.jpg","https://images-eu.ssl-images-amazon.com/images/G/31/img2020/img21/apparelGW/junatf23/unrecapay/WA_WW_3000._CB603210873_.jpg","https://images-eu.ssl-images-amazon.com/images/G/31/img23/AmazonPay/PD23/V2/Domestic-Prime_PC_Hero_3000x1200_Nectar._CB602511654_.jpg","https://images-eu.ssl-images-amazon.com/images/G/31/img17/Home/AmazonTV/MotionHero2023/3000x1200_Cheer-Up_V1._CB601144149_.jpg","https://m.media-amazon.com/images/I/61f8MRqXnNL._SX3000_.jpg","https://images-eu.ssl-images-amazon.com/images/G/31/prime/acq/PD23/hero/PC_Hero_3000x1200_ft._CB602532181_.jpg","https://images-eu.ssl-images-amazon.com/images/G/31/img21/Wireless/Shreyansh/BAU/Unrexc/D70978891_INWLD_BAU_Unrec_Uber_PC_Hero_3000x1200._CB594707876_.jpg"]

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

