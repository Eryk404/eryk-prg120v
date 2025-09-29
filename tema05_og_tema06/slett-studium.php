<!DOCTYPE html>
<html lang="no">
<head>
  <!-- Metadata section for page settings and resources -->
  <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slett studium</title>
  <script src="funksjoner.js"></script>
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

    /* Styling for select dropdown */
    select {
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
  <h3>Slett studium</h3>

  <!-- Form for collecting user input -->
  <form method="post" action="" id="slettStudiumSkjema" name="slettStudiumSkjema" onSubmit="return bekreft()">
    Studium
    <select name="studiumkode" id="studiumkode" required>
      <option value="">velg studium</option>
      <?php include("dynamiske-funksjoner.php"); listeboksStudiumkode(); ?>
    </select> <br/>
    <!-- Submit and reset buttons -->
    <input type="submit" value="Slett studium" id="slettStudiumKnapp" name="slettStudiumKnapp" />
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
  </form>

<?php
if (isset($_POST["slettStudiumKnapp"])) {
  include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
  
  $studiumkode = $_POST["studiumkode"];

  if (!$studiumkode) {
    print("Det er ikke valgt noe studium.");
  } else {
    // Check if the study program exists
    $sqlSetning = "SELECT studiumkode, studiumnavn FROM studium WHERE studiumkode='$studiumkode';";
    $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
    $antallRader = mysqli_num_rows($sqlResultat);

    if ($antallRader == 0) {
      print("Studium med kode $studiumkode finnes ikke i databasen.");
    } else {
      // Check for dependent courses in the emne table
      $sqlSetning = "SELECT COUNT(*) as antall FROM emne WHERE studiumkode='$studiumkode';";
      $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
      $rad = mysqli_fetch_array($sqlResultat);
      $antallEmner = $rad["antall"];

      if ($antallEmner > 0) {
        print("Kan ikke slette studium med kode $studiumkode fordi det er knyttet $antallEmner emne(r) til dette studiet. Slett emnene først.");
      } else {
        // Fetch the study name
        $sqlSetning = "SELECT studiumnavn FROM studium WHERE studiumkode='$studiumkode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
        $rad = mysqli_fetch_array($sqlResultat);
        $studiumnavn = $rad["studiumnavn"];

        // Delete the study program
        $sqlSetning = "DELETE FROM studium WHERE studiumkode='$studiumkode';";
        mysqli_query($db, $sqlSetning) or die("Ikke mulig å slette data i databasen");
        print("Følgende studium er nå slettet: $studiumkode - $studiumnavn");
      }
    }
  }
}
?>
</body>
</html>