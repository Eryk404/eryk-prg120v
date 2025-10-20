<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slett klasse</title>
    <script src="funksjoner.js"></script>
</head>
<body>
    <h3>Slett klasse</h3>
    <form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
        <input type="text" id="klassekode" name="klassekode" required placeholder="Skriv inn en klassekode" /> <br/>
        <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" />
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
        $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
        mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
        /* SQL-setning sendt til database-serveren */
        print ("F&oslash;lgende klasse er n&aring; slettet: $klassekode <br />");
    }
  }
}

?>
</body>
</html>