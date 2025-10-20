<!DOCTYPE html>
<html lang="no">
<head>
  <!-- Metadata section for page settings and resources -->
  <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrer student</title>
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

    /* Styling for select */
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
    <h3>Registrer student</h3>

    <!-- Form for collecting user input -->
    <form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">

    <input type="text" id="brukernavn" name="brukernavn" required placeholder="Skriv inn et brukernavn" /> <br/>
    <input type="text" id="fornavn" name="fornavn" required placeholder="Skriv inn et fornavn" /> <br/>
    <input type="text" id="etternavn" name="etternavn" required placeholder="Skriv inn et etternavn" /> <br/>
    <select id="klassekode" name="klassekode" required>
        <option value="">Velg klassekode</option>
        <?php
        include("db-tilkobling.php");
        $sqlSetning="SELECT klassekode FROM klasse ORDER BY klassekode;";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);
        for ($r=1;$r<=$antallRader;$r++)
        {
            $rad=mysqli_fetch_array($sqlResultat);
            $klassekode=$rad["klassekode"];
            print ("<option value='$klassekode'>$klassekode</option>");
        }
        ?>
    </select> <br/>

    <!-- Submit and reset buttons -->
    <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />

  </form>

</body>

</html>

<?php

if (isset($_POST ["registrerStudentKnapp"]))
{
    $brukernavn=$_POST ["brukernavn"];
    $fornavn=$_POST ["fornavn"];
    $etternavn=$_POST ["etternavn"];
    $klassekode=$_POST ["klassekode"];

    if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode)
    {
        print ("Alle felt m&aring; fylles ut");
    }
    else
    {
        include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
        
        $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

    if ($antallRader!=0) /* studenten er registrert fra før */
    {
        print ("Studenten er registrert fra f&oslash;r");
    }
    else
    {
        $sqlSetning="INSERT INTO student (brukernavn,fornavn,etternavn,klassekode)
        VALUES('$brukernavn','$fornavn','$etternavn','$klassekode');";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
        /* SQL-setning sendt til database-serveren */
        print ("F&oslash;lgende student er n&aring; registrert: $brukernavn $fornavn $etternavn $klassekode");
    }
  }
}

?>