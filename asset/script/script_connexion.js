let myForm = document.getElementById("myForm");

myForm.addEventListener("submit", function (event) {
    let mail = document.getElementById("mail_utilisateur");
    let password = document.getElementById("mdp_utilisateur");
    let mailFormat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,3})$/;
    let passwordFormat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

    if (mailFormat.test(mail.value) == false) {
        let errorMail = document.getElementById("error_mail");
        errorMail.innerHTML = "Votre adresse mail n'est pas valide";
        mail.style.borderColor = "red";
        event.preventDefault();
        mail.addEventListener("keydown", ()=>{
            errorMail.innerHTML=""; 
        })
    }
    if (passwordFormat.test(password.value) == false) {
        let errorPassword = document.getElementById("error_mdp");
        errorPassword.innerHTML = "Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre et doit faire entre 6 et 20 caractères";
        password.style.borderColor = "red";
        event.preventDefault();
        password.addEventListener("keydown", ()=>{
            errorPassword.innerHTML=""; 
        })
    }
}); 