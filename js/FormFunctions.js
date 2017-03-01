//no leading and trailing blank space in str
//helper function
function trim (str)
{
     return str.replace (/^\s+|\s+$/g, '');
}
function updateScoreInput(val)
    {
        document.getElementById('scoreInput').value = val;
    }
    
function validatePhoneOrMail()
{
    var phone_element = document.getElementById("Phone");
    var mail_element = document.getElementById("Mail");

    if ((trim(phone_element.value) === '') && (trim(mail_element.value)=== ''))
    {
        alert("Bitte geben Sie eine Telefonnummer oder Mailadresse an");
        return false;
    } else
    {
        return true;
    }
}

function validatePwd()
{
    //Pwd should contain at least 1 capital letter, 1 digit, 1 lower case 
    var errors = [];
    var newPwd_element = document.getElementById("Password1");
    if (newPwd_element.value.length < 8)
    {
        errors.push("Das Passwort muss min. 8 Zeichen lang sein! ");
    }
    if (newPwd_element.value.search(/[a-z]/) < 0)
    {
        errors.push("Das Passwort muss einen Kleinbuchstaben enthalten!");
    }
    if (newPwd_element.value.search(/[A-Z]/) < 0)
    {
        errors.push("Das Passwort muss einen Großbuchstaben enthalten!");
    }
    if (newPwd_element.value.search(/\d/) < 0)
    {
        errors.push("Das Passwort muss eine Ziffer enthalten!");
    }
    if (errors.length > 0)
    {
        alert(errors.join("\n"));
        return false;
    } else {
        return true;
    }
}

function comparePwds()
{
    var pw1_element = document.getElementById("Password1");
    var pw2_element = document.getElementById("Password2");
   
    
    if(pw1_element.value === pw2_element.value)
    {
        return true;
    } else {
        alert("Die Passwörter stimmen nicht überein!");
        return false;
    }
}

function validateUsername()
{
    var name_element = document.getElementById("Username");
    
    if (name_element.value.length < 8 || name_element.value.length > 8 )
    {
        alert("Der Benutzername muss 8 Zeichen lang sein!");
        return false;
    } else { 
        return true;
    }
}

function validateZip()
{
    var zip_element = document.getElementById("Zip");
    var regEx = /^990[0-9]{2}$/;
    if(regEx.test(zip_element.value))
    {
        return true;
    } else 
    {
        alert("Die PLZ muss mit 990 beginnen und 5 Zeichen lang sein!");
        return false;
    }
}

function validateZipLength()
{
    var plz_element = document.getElementById("PlzUser");
    
    if (plz_element.value.length < 5 || plz_element.value.length > 5 )
    {
        alert("Die PLZ muss genau 5 Zeichen lang sein!");
        return false;
    } else { 
        return true;
    }
}

function deleteAdv(val)
{
     document.getElementById("Advertisements"+val).action = "includes/functions/delete_advertisement.php";       
}

function openPic(val)
{
    if (val == undefined) {
        alert("Es ist kein Bild verfügbar!");
        return false;
    }
    else 
    {
        window.open(document.getElementById("picture").src);   
        return true;
    }

}
