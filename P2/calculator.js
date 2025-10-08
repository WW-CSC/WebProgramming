/*
Wyatt Walsh
CSC-390 Project 2
October 10th
Js for page 2
Calculator
 */
function addValueToList(value1, type, value2, result) {
    let choice;
    switch (type) {
        case 'add':
            choice = '+';
            break;
        case 'subtract':
            choice = '-';
            break;
        case 'divide':
            choice = '/';
            break;
        case 'multiply':
            choice = '*';
            break;
        case'power':
            choice = '**';
            break;
    }
    let nameListElement = document.querySelector('ul');
    console.log(nameListElement);
    let newListItem = document.createElement('li');
    newListItem.textContent = value1 + choice + value2 + ' = ' + result;
    nameListElement.appendChild(newListItem);
}
function addValueToListRoot(value1,result){
    let nameListElement = document.querySelector('ul');
    let newListItem = document.createElement('li');
    newListItem.textContent = 'square root of '+ value1+' = ' + result;
    nameListElement.appendChild(newListItem);
}
function clearBoxes(){
    document.querySelector('#Box1').value = "";
    document.querySelector('#Box2').value = "";
}

function add(){
    let value1 = Number.parseFloat(document.querySelector('#Box1').value);
    let value2 = Number.parseFloat(document.querySelector('#Box2').value);
    if (isNaN(value1)|| isNaN(value2)) {
        alert("A number was not entered in one or both of the box's please try again");
        clearBoxes();
    }else{
        out = value1 + value2;
        addValueToList(value1,'add',value2,out);
        clearBoxes();
    }
}
function subtract(){
    let value1 = Number.parseFloat(document.querySelector('#Box1').value);
    let value2 = Number.parseFloat(document.querySelector('#Box2').value);
    if (isNaN(value1)|| isNaN(value2)) {
        alert("A number was not entered in one or both of the box's please try again");
        clearBoxes();
    }else{
        out = value1 - value2;
        addValueToList(value1,'subtract',value2,out);
        clearBoxes();
    }
}
function divide(){
    let value1 = Number.parseFloat(document.querySelector('#Box1').value);
    let value2 = Number.parseFloat(document.querySelector('#Box2').value);
    if (isNaN(value1)|| isNaN(value2)) {
        alert("A number was not entered in one or both of the box's please try again");
        clearBoxes();
    }else{
        out = value1 / value2;
        addValueToList(value1,'divide',value2,out);
        clearBoxes();
    }
}
function multiply(){
    let value1 = Number.parseFloat(document.querySelector('#Box1').value);
    let value2 = Number.parseFloat(document.querySelector('#Box2').value);
    if (isNaN(value1)|| isNaN(value2)) {
        alert("A number was not entered in one or both of the box's please try again");
        clearBoxes();
    }else{
        out = value1 * value2;
        addValueToList(value1,'multiply',value2,out);
        clearBoxes();
    }
}
function power(){
    let value1 = Number.parseFloat(document.querySelector('#Box1').value);
    let value2 = Number.parseFloat(document.querySelector('#Box2').value);
    if (isNaN(value1)|| isNaN(value2)) {
        alert("A number was not entered in one or both of the box's please try again");
        clearBoxes();
    }else{
        out = value1 ** value2;
        addValueToList(value1,'power',value2,out);
        clearBoxes();
    }
}
function root(){
    let value1 = Number.parseFloat(document.querySelector('#Box1').value);
    if (isNaN(value1)) {
        alert("A number was not entered in  box1 please try again");
        clearBoxes();
    }else{
        out = Math.sqrt(value1);
        addValueToListRoot(value1,out);
        clearBoxes();
    }
}
