<?php
    function cleanInput($input){
        $tab = ["-", "_", "{", "}"]; 
        $input = str_replace($tab, " ", $input); 
        return htmlspecialchars(strip_tags(trim($input)), ENT_NOQUOTES);
    }
?>

