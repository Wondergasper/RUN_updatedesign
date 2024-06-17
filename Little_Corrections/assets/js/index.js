// Confim Password
var password = document.getElementById('password');
var confirm_password = document.getElementById('confirm-password');

function validatePassword(){
    if(password.value!=confirm_password.value){
        confirm_password.setCustomValidity("passwords don't match!");
    } else {
        confirm_password.setCustomValidity("");
    }
};

password.addEventListener("change", validatePassword);
confirm_password.addEventListener("keyup", validatePassword);

const link = document.getElementById('link');


const input = document.getElementById('input-text');

function autoExpand(){
    input.style.height = 'auto';
    input.style.height = input.scrollHeight + 'px'
}
input.addEventListener('input', autoExpand);


