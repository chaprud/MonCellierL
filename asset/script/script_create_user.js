let myForm = document.getElementById("myForm");

myForm.addEventListener("submit", function (event) {
    let nom = document.getElementById("nom_utilisateur");
    let prenom = document.getElementById("prenom_utilisateur");
    let mail = document.getElementById("mail_utilisateur");
    let password = document.getElementById("mdp_utilisateur");
    let myRegex = /^[A-Za-z0-9À-ÿ-']+$/;
    let mailFormat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    let passwordFormat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

    if (myRegex.test(nom.value) == false) {
        let errorNom = document.getElementById("error_nom");
        errorNom.innerHTML = "Vous ne pouvez utiliser dans votre nom que des lettres, des nombres, des tirets et apostrophes";
        nom.style.borderColor = "red";
        event.preventDefault();
    }
    if (myRegex.test(prenom.value) == false) {
        let errorPrenom = document.getElementById("error_prenom");
        errorPrenom.innerHTML = "Vous ne pouvez utiliser dans votre prénom que des lettres, des nombres, des tirets et des apostrophes";
        prenom.style.borderColor = "red";
        event.preventDefault();
    }
    if (mailFormat.test(mail.value) == false) {
        let errorMail = document.getElementById("error_mail");
        errorMail.innerHTML = "votre adresse mail n'est pas valide";
        mail.style.borderColor = "red";
        event.preventDefault();
    }
    if (passwordFormat.test(password.value) == false) {
        let errorPassword = document.getElementById("error_mdp");
        errorPassword.innerHTML = "le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre et doit faire entre 6 et 20 caractères";
        password.style.borderColor = "red";
        event.preventDefault();
    }
}); 



