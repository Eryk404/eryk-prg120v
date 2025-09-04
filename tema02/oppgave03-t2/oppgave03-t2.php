<?php

  // Check if the form has been submitted, if not print the else answer
  if (isset($_POST["student"])) {
      $student = trim($_POST["student"]); // Trim whitespace from input

      // Check for yes responses
      if ($student == 'j' || $student == 'J' || $student == 'ja' || $student == 'JA' || $student == 'Ja') {
          print("Du har svart ja på spørsmålet om du er student");
      } 
      // Check for no responses
      else if ($student == 'n' || $student == 'N' || $student == 'nei' || $student == 'NEI' || $student == 'Nei') {
          print("Du har svart nei på spørsmålet om du er student");
      } 
      // Check for empty input
      else if ($student == '') {
          print("Du har ikke svart på spørsmålet om du er student");
      } 
      // Handle invalid responses
      else {
          print("Du har ikke svart ja eller nei på spørsmålet om du er student");
      }
  } else {
      print("Du har ikke svart på spørsmålet om du er student");
  }

?>