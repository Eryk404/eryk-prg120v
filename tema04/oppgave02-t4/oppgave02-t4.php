<?php

$klassekode=$_POST["klassekode"];

$bokstav01 = $klassekode[0];
$bokstav02 = $klassekode[1];
$tall01 = $klassekode[2];

if ($klassekode)
  {
    if (ctype_alpha($bokstav01) && ctype_alpha($bokstav02) && ctype_digit($tall01))
      if (strlen($klassekode) == 3)
        print("Klassekoden er $klassekode <br/>");
      else{
        print("Et klassekode må bestå av to bokstaver og ett tall <br/>");
      }
    else {
      print ("Et klassekode må bestå nøyaktig to bokstaver og ett tall <br/>");
    }
  }
else if (!$klassekode){
  print ("Du må oppgi et klassekode <br/>");
}

?>