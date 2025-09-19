<?php

$postnummer=$_POST["postnummer"];

if ($postnummer)
  {
    if (ctype_digit($postnummer))
      if (strlen($postnummer) == 4)
        print("$postnummer <br/>")
      else{
        print("Et postnummer må bestå av nøyaktig fire sifre.")
      }
    else {
      print ("Postnummeret må kun inneholde tall <br/>")
    }
  }
else if (!$postnummer){
  print ("Du må oppgi et postnummer <br/>")
}

?>