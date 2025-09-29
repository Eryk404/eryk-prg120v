<!DOCTYPE html>
<html lang="no">
<head>
  <!-- Metadata section for page settings and resources -->
  <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrer emne</title>
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
  <h3>Registrer emne</h3>

  <!-- Form for collecting user input -->
  <form method="post" action="" id="registrerEmneSkjema" name="registrerEmneSkjema">
    Emnekode <input type="text" id="emnekode" name="emnekode" required placeholder="Skriv inn et emnekode" /> <br/>
    Emnenavn <input type="text" id="emnenavn" name="emnenavn" required placeholder="Skriv inn et emnenavn" /> <br/>
    Studiumkode
    <select name="studiumkode" id="studiumkode" required>
      <option value="">velg studium</option>
      <?php include("dynamiske-funksjoner.php"); listeboksStudiumkode(); ?>
    </select> <br/>
    <!-- Submit and reset buttons -->
    <input type="submit" value="Registrer emne" id="registrerEmneKnapp" name="registrerEmneKnapp" />
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
  </form>

<?php
if (isset($_POST["registrerEmneKnapp"])) {
    $emnekode = $_POST["emnekode"];
    $emnenavn = $_POST["emnenavn"];
    $studiumkode = $_POST["studiumkode"];

    if (!$emnekode || !$emnenavn || !$studiumkode) {
        print("Alle felt må fylles ut.");
    } else {
        include("db-tilkobling.php");

        // Check if studiumkode exists in studium table
        $sqlSetning = "SELECT * FROM studium WHERE studiumkode='$studiumkode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
        $antallRaderStudium = mysqli_num_rows($sqlResultat);

        if ($antallRaderStudium == 0) {
            print("Studiumkoden $studiumkode finnes ikke i databasen. Vennligst registrer studiet først.");
        } else {
            // Check if emnekode already exists
            $sqlSetning = "SELECT * FROM emne WHERE emnekode='$emnekode';";
            $sqlResultat = mysqli_query($db, $sqlSetning) or die("Ikke mulig å hente data fra databasen");
            $antallRader = mysqli_num_rows($sqlResultat);

            if ($antallRader != 0) {
                print("Emnet med kode $emnekode er allerede registrert.");
            } else {
                // Insert the new course
                $sqlSetning = "INSERT INTO emne (emnekode, emnenavn, studiumkode) VALUES ('$emnekode', '$emnenavn', '$studiumkode');";
                mysqli_query($db, $sqlSetning) or die("Ikke mulig å registrere data i databasen");
                print("Følgende emne er nå registrert: $emnekode $emnenavn (Studiumkode: $studiumkode)");
            }
        }
    }
}
?>
</body>
</html>