<?php

$klassekode = $_POST["klassekode"];

function validerKlassekode($klassekode) {
    if (empty($klassekode)) {
        return "Du må oppgi et klassekode <br/>";
    }
    
    if (strlen($klassekode) != 3) {
        return "Et klassekode må bestå av nøyaktig tre tegn <br/>";
    }
    
    $bokstav01 = $klassekode[0];
    $bokstav02 = $klassekode[1];
    $tall01 = $klassekode[2];

    if (ctype_alpha($bokstav01) && ctype_alpha($bokstav02) && ctype_digit($tall01)) {
        return "Klassekoden er $klassekode <br/>";
    } else {
        return "Et klassekode må bestå av to bokstaver og ett tall <br/>";
    }
}

$result = validerKlassekode($klassekode);
print($result);

?>