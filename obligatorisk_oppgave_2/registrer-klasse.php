<!DOCTYPE html>
<html lang="no">
<head>
  <!-- Metadata section for page settings and resources -->
  <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrer klasse</title>
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
    <h3>Registrer klasse</h3>

    <!-- Form for collecting user input -->
    <form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema">

    <input type="text" id="klassekode" name="klassekode" required placeholder="Skriv inn en klassekode" /> <br/>
    <input type="text" id="klassenavn" name="klassenavn" required placeholder="Skriv inn et klassenavn" /> <br/>
    <input type="text" id="studiumkode" name="studiumkode" required placeholder="Skriv inn en studiumkode" /> <br/>

    <!-- Submit and reset buttons -->
    <input type="submit" value="Registrer klasse" id="registrerKlasseKnapp" name="registrerKlasseKnapp" />
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />

  </form>

</body>

</html>

<?php

if (isset($_POST ["registrerKlasseKnapp"]))
{
    $klassekode=$_POST ["klassekode"];
    $klassenavn=$_POST ["klassenavn"];
    $studiumkode=$_POST ["studiumkode"];

    if (!$klassekode || !$klassenavn || !$studiumkode)
    {
        print ("Alle felt m&aring; fylles ut");
    }
    else
    {
        include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
        
        $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

    if ($antallRader!=0) /* klassen er registrert fra før */
    {
        print ("Klassen er registrert fra f&oslash;r");
    }
    else
    {
        $sqlSetning="INSERT INTO klasse (klassekode,klassenavn,studiumkode)
        VALUES('$klassekode','$klassenavn','$studiumkode');";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
        /* SQL-setning sendt til database-serveren */
        print ("F&oslash;lgende klasse er n&aring; registrert: $klassekode $klassenavn $studiumkode");
    }
  }
}

?>