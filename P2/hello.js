/*
Wyatt Walsh
CSC-390 Project 2
October 10th
Js for page 1
Saying hello 
 */
function onPageLoad(){
    let name = askName();
    while (name == ""){
        name = askName();
    }
    let age = askAge();
    while (isNaN(age)|| age > 120 || age < 1){
        age = askAgeAgain();
    }
    alert("Hello "+name+". You are "+age+" years old!")

}
function askName(){
    let name = prompt("Please enter your name");
    return name;
}
function askAge(){
    let age = parseInt(prompt("Please enter your age"));
    return age;
}
function askAgeAgain(){
    let age = parseInt(prompt("Please enter and age between 120 and 1"));
    return age;
}

window.onload = onPageLoad();
