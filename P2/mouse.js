/*
Wyatt Walsh
CSC-390 Project 2
October 10th
Js for page 3
Mouse Chase
This part of the project I don't know why but I couln't get the event listeners to work with MouseOnButton and toZimbabwe 
so i call the functions within the button on the HTML
*/

function MouseOnButton(){
    let chaseButton = document.querySelector('#chaseButton');
    let x = Math.random() * (window.innerWidth - 200);
    let y = Math.random() * (window.innerHeight - 200);
    chaseButton.style.left = x + 'px';
    chaseButton.style.top = y + 'px'; 
}
function toZimbabwe(){
    window.location.href = 'zimbabwe.html';
}
function changeScreenColor(){
    let colorNumber = '#';
    let digits = "123456789ABCDEF"
    for (let i = 0; i < 6; i++) {
        // had to look up the use of Math.floor becasue i didnt realise i was genrating non integers
        let temp = digits[Math.floor(Math.random()*16)];
        colorNumber += temp;    
    }
    document.body.style.backgroundColor = colorNumber;
}
function pageLoad(){
    setInterval(changeScreenColor, 3000);
}
window.onload = pageLoad;