<?php

  $tall01=$_POST["tall01"];
  $tall02=$_POST["tall02"];
  $regneoperasjon=$_POST["regneoperasjon"];
  $regneprint = 0;
  $svar = 0;

  if($regneoperasjon != 1 && $regneoperasjon != 2 && $regneoperasjon != 3 && $regneoperasjon != 4)
  {
    print("Feil regneoperasjons tall <br/>");
  }
  else
  {
    switch($regneoperasjon)
    {
      case 1:
        $svar = $tall01 + $tall02;
        $regneprint = "Addisjon";
        break;
      case 2:
        $svar = $tall01 - $tall02;
        $regneprint = "Subtraksjon";
        break;
      case 3:
        $svar = $tall01 * $tall02;
        $regneprint = "Multiplikasjon";
        break;
      case 4:
        $svar = $tall01 / $tall02;
        $regneprint = "Divisjon";
        break;
    }

  if(!$tall01 && !$tall02 && !$regneoperasjon)
    {
      print("Du har ikke svart på spørsmålene");
    }
  else
  {
    print("Tall 1 er $tall01 <br/>");
    print("Tall 2 er $tall02 <br/>");
    print("Regneoperasjon er $regneprint <br/>");
    print("Resultatet av regneoperasjonen er $svar <br/>");
  }
}
?>