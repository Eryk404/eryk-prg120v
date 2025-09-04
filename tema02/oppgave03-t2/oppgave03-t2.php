<?php

  $student=$_POST["student"];

  if($student == 'j'or $student == 'J'or $student == 'ja'or $student == 'Ja'or $student == 'JA')
    {
      print("Du har svart ja på spørsmålet om du er student");
    }
  else if($student == 'j'or $student == 'J'or $student == 'ja'or $student == 'Ja'or $student == 'JA')
    {
      print("Du har svart nei på spørsmålet om du er student");
    }
  else if($student == 'j'or $student == 'J'or $student == 'ja'or $student == 'Ja'or $student == 'JA' or $student == 'j'or $student == 'J'or $student == 'ja'or $student == 'Ja'or $student == 'JA')
    {
      print("Du har ikke svart ja eller nei på spørsmålet om du er student");
    }
  else if($student == '')
    {
      print("Du har ikke svart på spørsmålet om du er student");
    }
?>