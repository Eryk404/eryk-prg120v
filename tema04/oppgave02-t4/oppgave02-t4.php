<?php

$klassekode=$_POST["klassekode"];

if ($klassekode)
  {
    if (ctype_digit($klassekode[0]) && ctype_digit($klassekode[1]) && ctype_alpha($klassekode[2]))
      if (strlen($klassekode) == 3)
        print("Klassekoden er $klassekode <br/>");
      else{
        print("Et klassekode må bestå av to tall og ett bokstav <br/>");
      }
    else {
      print ("Et klassekode må bestå nøyaktig to tall og ett bokstav <br/>");
    }
  }
else if (!$klassekode){
  print ("Du må oppgi et klassekode <br/>");
}

?>