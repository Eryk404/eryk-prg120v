<?php

$emnekode = $_POST["emnekode"]; 

if (empty($emnekode)) {
    print("Du må oppgi et emnekode <br/>");
} else if (strlen($emnekode) == 7) {
    $bokstav01 = $emnekode[0];
    $bokstav02 = $emnekode[1];
    $bokstav03 = $emnekode[2];
    $tall01 = $emnekode[3];
    $tall01 = $emnekode[4];
    $tall01 = $emnekode[5];
    $bokstav04 = $emnekode[6];

    if (ctype_alpha($bokstav01) && ctype_alpha($bokstav02) && ctype_alpha($bokstav03) && ctype_alpha($bokstav04) && ctype_digit($tall01) && ctype_digit($tall02) && ctype_digit($tall03)) {
        print("Emnekoden er $klassekode <br/>");
    } else {
        print("Et emnekoden må bestå av fire bokstaver og tre tall <br/>");
    }
} else {
    print("Et emnekoden må bestå av nøyaktig tre bokstaver, tre tall og et bokstav som site tegn <br/>");
}

?>