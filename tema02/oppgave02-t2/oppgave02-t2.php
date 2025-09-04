<?php

  $student=$_POST["student"];

  if($student == 'j')
    {
      print("Du har svart ja på spørsmålet om du er student");
    }
  else if($student == 'n')
    {
      print("Du har svart nei på spørsmålet om du er student");
    }
  else if($student != 'j' && != 'n')
    {
      print("Du har ikke svart ja eller nei på spørsmålet om du er student");
    }
  else if($student == '')
    {
      print("Du har ikke svart på spørsmålet om du er student");
    }
?>