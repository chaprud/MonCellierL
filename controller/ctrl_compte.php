<?php
    // import de la bdd
    include "./utils/bddConnect.php"; 
    // import du header
    include "./view/view_header.php"; 
    // initialiser la session
    session_start(); 

    echo "bienvenue sur votre compte"; 

    //import de la page
    include "./view/view_compte.php"; 


?>