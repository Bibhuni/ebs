const cardNumber = document.getElementById('card_number');
const cvv = document.getElementById('cvv');
const name = document.getElementById('c_name');
const month = document.getElementById('month');
const year = document.getElementById('year');
const form = document.getElementById('form');
const errorElement = document.getElementById('error');

let cvvValues = ['199','254']

form.addEventListener('submit',(e)=>{
    let message = []
    if(cardNumber.value === '' || cardNumber.value == null){
        message.push('*Enter your card number first.');
    }else if(cardNumber.value.length != 16){
        message.push('*Invalid card number!');
    }else if(!cvvValues.includes(cvv.value)){
        message.push('*Invalid cvv');

    }
    if(message.length > 0){
        e.preventDefault()
        errorElement.innerText = message.join(',')
    }
})