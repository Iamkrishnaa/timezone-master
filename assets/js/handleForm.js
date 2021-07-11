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
        // let status = JSON.parse(xhr.responseText)["status"];
        console.log(this.responseText);
        // console.log(status);
    }

}

function validateFormData(){
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


    checkSamePassword(password, confirmPassword);
    checkUser(userNameField.value);
    isEmpty(firstName);
    isEmpty(lastName);
    isEmpty(email);
    isEmpty(phoneNumber);
    isEmpty(state);
    isEmpty(city);
    isEmpty(tole);
    isEmpty(userName);
    isEmpty(password);
    isEmpty(confirmPassword);
    
}

function checkSamePassword(pass, confPass){
    if(pass.value !== confPass.value){
        pass.style.borderBottom = "2px solid";
        pass.style.borderBottomColor = "red";
        confPass.style.borderBottom = "2px solid";
        confPass.style.borderBottomColor = "red";
        return true;
    }else{

        pass.style.borderBottom = "1px solid";
        pass.style.borderBottomColor = "#ddd";
        confPass.style.borderBottom = "1px solid";
        confPass.style.borderBottomColor = "#ddd";
        return false;
    }
}

function isEmpty(field){
    if(field.value === ""){
        field.style.borderBottom = "2px solid";
        field.style.borderBottomColor = "red";
        return true;
    }else{
        field.style.borderBottom = "1px solid";
        field.style.borderBottomColor = "#ddd";
        return false;
    }
}


function checkUser(userName){
    let formData = {};

    formData["checkUserName"] = userName;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "controller/RegisterUser.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify(formData));


    xhr.onload = function() {
        let isUserAlreadyExists = JSON.parse(xhr.responseText)["isUserPresent"];
        console.log(this.responseText);
        if(isUserAlreadyExists){
            userNameField.style.borderBottom = "2px solid";
            userNameField.style.borderBottomColor = "red";
        }else{
            userNameField.style.borderBottom = "1px solid";
            userNameField.style.borderBottomColor = "#ddd";
        }
    }
}



let userNameField = document.getElementById('userName');
let submitButton = document.getElementById("submit");
submitButton.addEventListener('click', function(){checkUser(userNameField.value)});