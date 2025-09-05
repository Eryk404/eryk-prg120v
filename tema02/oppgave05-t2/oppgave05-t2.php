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
        break;
      case 2:
        $svar = $tall01 - $tall02;
        break;
      case 3:
        $svar = $tall01 * $tall02;
        break;
      case 4:
        $svar = $tall01 / $tall02;
        break;
    }

  if(!$tall01 || !$tall02 || $regneoperasjon)
    {
      print("Du har ikke svart på spørsmålene");
    }

    if($regneoperasjon = 1)
    {
      $regneprint = "Addisjon";
    }
    elseif($regneoperasjon = 2)
    {
      $regneprint = "Subtraksjon";
    }
    elseif($regneoperasjon = 3)
    {
      $regneprint = "Multiplikasjon";
    }
    elseif($regneoperasjon = 4)
    {
      $regneprint = "Divisjon";
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