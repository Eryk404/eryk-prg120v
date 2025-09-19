<?php

$postnummer = $_POST["postnummer"]; 

function validerPostnr($postnummer) {
    if (empty($postnummer)) {
        return "Du må oppgi et postnummer <br/>";
    }
    
    if (!ctype_digit($postnummer)) {
        return "Postnummeret må kun inneholde tall <br/>";
    }
    
    if (strlen($postnummer) != 4) {
        return "Et postnummer må bestå av nøyaktig fire sifre <br/>";
    }
    
    return "Postnummeret er $postnummer <br/>";
}

$result = validerPostnr($postnummer);
print($result);

?>