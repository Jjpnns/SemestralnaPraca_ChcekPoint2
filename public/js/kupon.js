
document.getElementById('zavrietBtn').addEventListener('click', function () {
    $('#zrusenieModal').modal('show');
});

function validateObjednavka() {
    let meno = document.forms["objednavka-form"]["meno"].value;
    let priezvisko =  document.forms["objednavka-form"]["meno"].value;
    let email =  document.forms["objednavka-form"]["meno"].value;


    let valid = true;


    if((meno === "" && email === "") && priezvisko === "") {
        warning("main_output", "Prosím zadajte údaje");
        valid = false;
    } else {
        hideWarning("main_output");
    }

    if(email === "" ) {
        warning("email_input","Prosím zadajte váš email");
        valid = false;
    } else if (validateEmail(email) === false) {
        warning("email_input","Nesprávny formát emailu");
        valid = false;
    } else if(email.length >  255) {
        warning("email_input", "Presiahli ste maximálnu dĺžku emailu");
        valid = false;
    } else if(checkEmail(email)) {
        hideWarning("email_input");
    }



    if(meno.length !== 0 && meno.length >  50) {
        warning("meno_input", "Presiahli ste maximálnu dĺžku mena");
        valid = false;
    } else {
        hideWarning("meno_input");
    }

    if(priezvisko.length !== 0 &&  priezvisko.length >  50) {
        warning("priezvisko_input","Presiahli ste maximálnu dĺžku priezviska" );
        valid = false;
    } else {
        hideWarning("priezvisko_input");
    }

    return valid;
}

function validateEmail(email) {
    let format = /^\S+@\S+.\S+$/;
    if (format.test(email)===true) {
        return true;
    } else {
        warning("email_input", "Zadali ste email v nespravnom formate");
        return false;
    }
}