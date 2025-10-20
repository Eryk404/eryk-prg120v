<!DOCTYPE html>
<html lang="no">
<head>
  <!-- Metadata section for page settings and resources -->
  <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slett klasse</title>
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
  <script src="obligatorisk_oppgave_2/bekfreft.js"></script>
</head>

<body>

    <!-- Visible content of the page -->
    <h3>Slett klasse</h3>

    <!-- Form for collecting user input -->
    <form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">

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
    <input type="submit" value="Slett klasse" id="slettKlasseKnapp" name="slettKlasseKnapp" />
    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />

  </form>

<?php
if (isset($_POST ["slettKlasseKnapp"]))
{
    $klassekode=$_POST ["klassekode"];

    if (!$klassekode)
    {
        print ("Alle felt m&aring; fylles ut");
    }
    else
    {
        include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
        
        $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

    if ($antallRader==0) /* klassen er ikke registrert */
    {
        print ("Klassen finnes ikke");
    }
    else
    {
        $sqlSetning="SELECT COUNT(*) AS antallStudenter FROM student WHERE klassekode='$klassekode';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $rad=mysqli_fetch_array($sqlResultat);
        $antallStudenter=$rad["antallStudenter"];

        if ($antallStudenter > 0)
        {
            print ("Kan ikke slette klasse med studenter i");
        }
        else
        {
            $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
            mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
            /* SQL-setning sendt til database-serveren */
            print ("F&oslash;lgende klasse er n&aring; slettet: $klassekode <br />");
        }
    }
  }
}

?>
</body>
</html>