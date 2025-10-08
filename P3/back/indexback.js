// I wanted to add something to the back ground of the index page so i took the back ground change from the previous project
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