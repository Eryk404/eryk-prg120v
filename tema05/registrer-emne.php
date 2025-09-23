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

    <input type="text" id="emnekode" name="emnekode" required placeholder="Skriv in et emnekode" /> <br/>
    <input type="text" id="emnenavn" name="emnenavn" required placeholder="Skriv in et emnenavn" /> <br/>
    <input type="text" id="studiumkode" name="studiumkode" required placeholder="Skriv in et studiumkode" /> <br/>

    <!-- Submit and reset buttons -->
    <input type="submit" value="Registrer emne" id="registrerEmneKnapp" name="registrerEmneKnapp" />
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />

  </form>

</body>

</html>

<?php

if (isset($_POST ["registrerEmneKnapp"]))
{
    $emnekode=$_POST ["emnekode"];
    $emnemnavn=$_POST ["emnenavn"];
    $studiumkode=$_POST ["studiumkode"];

    if (!$studiumkode || !$studiumnavn)
    {
        print ("Alle felt m&aring; fylles ut");
    }
    else
    {
        include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
        
        $sqlSetning="SELECT * FROM emne WHERE emnekode='$emnekode';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

    if ($antallRader!=0) /* Emnet er registrert fra før */
    {
        print ("Emnet er registrert fra forslag");
    }
    else
    {
        $sqlSetning="INSERT INTO emne (emnekode,emnenavn,studiumkode)
        VALUES('$emnekode','$emnenavn','$studiumkode');";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
        /* SQL-setning sendt til database-serveren */
        print ("F&oslash;lgende studium er n&aring; registrert: $emnekode $emnenavn $studiumkode");
    }
  }
}


?>