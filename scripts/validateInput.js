var regExp_firstname = /^[A-Za-z \s]{1,8}$/;
var regExp_email = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
//The strong password must be eight characters or longer,must contain at least 1 lowercase,1 uppercase,1 numeric and one specical character
var regExp_strongpassword =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
//The medium password must be six characters or longer,has at least one lowercase and one uppercase, or one alphabetical and one number
var regExp_mediumpassword =/^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/;

function validateInput(inEleId,outEleId) {
    var inpObj = document.getElementById(inEleId);
    
    if (!inpObj.checkValidity()) {
        document.getElementById(outEleId).innerHTML = inpObj.validationMessage;
    } else {
        document.getElementById(outEleId).innerHTML = "";
    } 
}


function validateConfirmPass(inPassId,inConfirmId,outEleId) {
         console.log(document.getElementById(inPassId).value);
        
   if (document.getElementById(inPassId).value != document.getElementById(inConfirmId).value){
           document.getElementById(outEleId).innerHTML = "Password not matching";
    }else {
        document.getElementById(outEleId).innerHTML = "";
    } 
}


function regValidInput(inEleId,outEleId) {
    if (!checkInput(inEleId)) {
        document.getElementById(outEleId).innerHTML = "Invalid input";
    } else {
        document.getElementById(outEleId).innerHTML = "";
    } 
}

function checkInput(inEleId) {
    var inpObj = document.getElementById(inEleId);

    console.log(inpObj.getAttribute("name"));
     validInput = false;

    switch (inpObj.getAttribute("name")) {
        case "firstname":
            validInput= regExp_firstname.test(inpObj.value);
            break;
        case "lastname":
            validInput= regExp_firstname.test(inpObj.value);
            break;    
        case "email":
            validInput= regExp_email.test(inpObj.value);
            break;
        case "BirthYear":
            validInput=parseInt(inpObj.value)>=1878&&parseInt(inpObj.value)<=2000;
            break;
        case "psw":
            validInput= regExp_mediumpassword.test(inpObj.value);
            break;                
        default:
        console.log("Unknown input name, no validation on it");    
        break;
    }
    
    return validInput;

}

function validateUniqueEmail(outEleId){
 
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
        console.log(this.readyState); 
        console.log(this.status); 
        console.log(this.responseText); 

        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText.includes("none")){
               document.getElementById(outEleId).className = "successmsg";
               document.getElementById(outEleId).innerHTML = "This email is available";
           }else{
               document.getElementById(outEleId).className = "errormsg";
               document.getElementById(outEleId).innerHTML = "This email is used and not available";
            }
         }else{
            console.log("Cannot check database for some reason");
         }
    }
    xmlhttp.open("GET", "searchdb.php?q="+document.getElementsByName('email')[0].value, true);
    xmlhttp.send();


}
