<?php

  $gift=$_POST["gift"];
  $barn=$_POST["barn"];

  if(!$gift || !$barn)
    {
      print("Du har ikke svart på spørsmålene");
    }

  else if($gift == 'j' && $barn == 'j')
    {
      print("Du er gift og har barn");
    }

  else if($gift == 'j' || && $barn == 'n')
    {
      print("Du er gift og har ikke barn");
    }

  else if($gift == 'n' || && $barn == 'j')
    {
      print("Du er ikke gift og har barn");
    }

  else if($gift == 'n' || && $barn == 'n')
    {
      print("Du er ikke gift og har ikke barn");
    }
  else
    {
      print("Du har ikke svart ja eller nei på begge spørsmålene")
    }

?>