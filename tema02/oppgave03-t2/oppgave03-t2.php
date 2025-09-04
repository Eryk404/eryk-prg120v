<?php

if (isset($_POST["student"])) 
  {
      $student = trim($_POST["student"]); // Trim whitespace from input
      $studentLower = strtolower($student); // Convert input to lowercase

      // Check for yes responses
      if ($studentLower == 'j' || $studentLower == 'ja') 
        {
          print("Du har svart ja på spørsmålet om du er student");
        }

      // Check for no responses
      else if ($studentLower == 'n' || $studentLower == 'nei') 
        {
          print("Du har svart nei på spørsmålet om du er student");
        }

      // Check for empty input
      else if ($studentLower == '') 
        {
          print("Du har ikke svart på spørsmålet om du er student");
        }

      // Handle invalid responses
      else 
      {
        print("Du har ikke svart ja eller nei på spørsmålet om du er student");
      }
  } 
  else 
    {
      print("Du har ikke svart på spørsmålet om du er student");
    }

?>