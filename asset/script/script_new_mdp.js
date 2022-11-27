let myForm = document.getElementById("newMdp");

myForm.addEventListener("submit", function (event) {
    let password = document.getElementById("mdp_utilisateur");
    let passwordFormat = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

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