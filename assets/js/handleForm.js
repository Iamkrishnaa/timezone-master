let firstName = document.getElementById('firstName');
let lastName = document.getElementById('lastName');
let email = document.getElementById('email');
let phoneNumber = document.getElementById('phoneNumber');
let state = document.getElementById('state');
let city = document.getElementById('city');
let tole = document.getElementById('tole');
let userName = document.getElementById('userName');
let password = document.getElementById('password');
let confirmPassword = document.getElementById('confirmPassword');
let submitButton = document.getElementById("submit");

async function validateFormData(){
    if(
        !isEmpty(firstName) && !isEmpty(lastName) && 
        !isEmpty(email) && !isEmpty(phoneNumber) && 
        !isEmpty(state) && !isEmpty(city) && 
        !isEmpty(tole) && !isEmpty(userName) && 
        !isEmpty(password) && !isEmpty(confirmPassword)
        ){
            if(!checkSamePassword(password, confirmPassword)){
                let isUserPresent = await checkUser(userName.value);
                if(!isUserPresent){
                    registerUser();
                }else{
                    handleErrorMessage(userName, true);
                }
            }
        }
    
}

function checkSamePassword(pass, confPass){
    if(pass.value !== confPass.value){
        handleErrorMessage(pass, true);
        handleErrorMessage(confPass, true);
        return true;
    }else{
        handleErrorMessage(pass, false);
        handleErrorMessage(confPass, false);
        return false;
    }
}

function validateEmail(mail) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    isValid =  re.test(mail.toLowerCase());
    if (isValid){
        handleErrorMessage(email, false);
        return true;
    }else{
        handleErrorMessage(email, true);
        return false;
    }
}

function isEmpty(field){
    if(field.value === ""){
        handleErrorMessage(field, true);
        return true;
    }else{
        handleErrorMessage(field, false);
        return false;
    }
}

function handleErrorMessage(field, status){
    if(status == true){
        field.style.borderBottom = "2px solid";
        field.style.borderBottomColor = "red";
    }else{
        field.style.borderBottom = "1px solid";
        field.style.borderBottomColor = "#ddd";
    }
}

async function checkUser(uName){
    var data = {
        "checkUserName": uName
    }
    var headers = {
        "Content-Type": "application/json",
     }

     let response = await fetch("controller/RegisterUser.php", {
            method: "POST",
            headers: headers,
            body:  JSON.stringify(data)
        }
     );
    
     let result = await response.json();
     return(result['isUserPresent']);
    // fetch("controller/RegisterUser.php", {
    //     method: "POST",
    //     headers: headers,
    //     body:  JSON.stringify(data)
    // })
    // .then(function(response){ 
    //     return response.json(); 
    // })
    // .then(function(data){ 
    //     console.log(data)
    // });
}

function registerUser() {
    var form = document.querySelector('form');
    var data = new FormData(form);

    let formData = {};

    formData["register"] = "ok";
    for (let dat of data) {
        formData[dat[0]] = dat[1];
    }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "controller/RegisterUser.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify(formData));


    xhr.onload = function() {
        console.log(this.responseText);
        let response = JSON.parse(this.responseText);
        if(response["status"] === "Registration Success"){
            alert("login success, you can login");
            location.href = "login.php";
        }else{
            alert("Something went wrong.");
        }
    }

}

email.addEventListener('input', function(){
    validateEmail(email.value);
});

confirmPassword.addEventListener('input', function(){
    checkSamePassword(password, confirmPassword);
});

submitButton.addEventListener('click', function(){
    validateFormData();
});