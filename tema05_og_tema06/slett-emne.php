<!DOCTYPE html>
<html lang="no">
<head>
  <!-- Metadata section for page settings and resources -->
  <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slett emne</title>
  <style>
    /* Styling for the entire page */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
    }

    /* Styling for the heading */
    h3 {
      color: #333;
      text-align: center;
    }

    /* Styling for the form container */
    form {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      max-width: 400px;
      margin: 0 auto;
      text-align: center;
    }

    /* Styling for labels */
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      text-align: center;
    }

    /* Styling for text and number input fields */
    input[type="text"],
    input[type="number"] {
      width: 90%;
      padding: 10px;
      margin-bottom: 15px;
      border: 2px solid #ccc;
      border-radius: 4px;
    }

    /* Styling for submit and reset buttons */
    input[type="submit"],
    input[type="reset"] {
      background-color: #5cb85c;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
      width: 45%;
      margin: 5px;
      display: inline-block;
    }

    /* Specific styling for the reset button */
    input[type="reset"] {
      background-color: #d9534f;
    }

    /* Hover effect for buttons */
    input[type="submit"]:hover,
    input[type="reset"]:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <!-- Visible content of the page -->
  <h3>Slett emne</h3>

  <!-- Form for collecting user input -->
  <form method="post" action="" id="slettEmneSkjema" name="slettEmneSkjema">
    <input type="text" id="emnekode" name="emnekode" required placeholder="Skriv inn et emnekode" /> <br/>
    <!-- Submit and reset buttons -->
    <input type="submit" value="Slett emne" id="slettEmneKnapp" name="slettEmneKnapp" />
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
  </form>

<?php
if (isset($_POST["slettEmneKnapp"])) {
  include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
  
  $emnekode = $_POST["emnekode"];

  if (!$emnekode) {
    print("Emnekode må fylles ut.");
  } else {
    // Check if emnekode exists in emne table
    $sqlSetning = "SELECT emnekode, emnenavn, studiumkode FROM emne WHERE emnekode='$emnekode';";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
    $antallRaderEmne = mysqli_num_rows($sqlResultat);

    if ($antallRaderEmne == 0) {
      print("Emne med kode $emnekode finnes ikke i databasen.");
    } else {
      // Fetch the course details
      $rad = mysqli_fetch_array($sqlResultat);
      $emnenavn = $rad["emnenavn"];
      $studiumkode = $rad["studiumkode"];

      // Delete the course
      $sqlSetning = "DELETE FROM emne WHERE emnekode='$emnekode';";
      mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");
      print("Følgende emne er nå slettet: $emnekode - $emnenavn (Studiumkode: $studiumkode)");
    }
  }
}
?>
</body>
</html>