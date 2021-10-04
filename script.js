const email = document.getElementById('email');
const emailDiv = document.getElementById('email-div');
const arrow = document.getElementById('arrow');
const checkBox = document.getElementById('checkbox');
const terms = document.getElementById('terms');
const subText = document.getElementById('subs-text');
const errorMessage = document.getElementById('error-msg');
const mainP = document.getElementById('main-p');
const submitBtn = document.getElementById('btn-submit');

submitBtn.style.display = 'none';
//email test regex (doesnt allow spaces)
let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function checkEmail(email){
    let text = email.value;
    let domain = text.split(".");
    if(regex.test(text)){
        if(domain[1] != 'co'){           
            submitBtn.style.display = 'block';
            errorMessage.innerHTML = "";
        }else{
            errorMessage.innerHTML ='We are not accepting subscriptions from Colombia emails';
            submitBtn.style.display = 'none';
        }       
    } else{
        errorMessage.innerHTML = 'Please provide a valid e-mail address';
        submitBtn.style.display = 'none';
    }
}
function checkTos(){
    if(checkBox.checked){
        checkEmail(email);
    } else{
        errorMessage.innerHTML = 'You must accept the terms and conditions';
    }
}  

email.addEventListener('change', checkTos);
checkBox.addEventListener('change', checkTos);

