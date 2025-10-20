<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer klasse</title>
</head>
<body>
    <h3>Registrer klasse</h3>
    <form method="post" action="">
        <input type="text" id="klassekode" name="klassekode" required placeholder="Skriv inn en klassekode" /> <br/>
        <input type="text" id="klassenavn" name="klassenavn" required placeholder="Skriv inn et klassenavn" /> <br/>
        <input type="text" id="studiumkode" name="studiumkode" required placeholder="Skriv inn en studiumkode" /> <br/>
        <input type="submit" value="Registrer klasse" name="registrerKlasseKnapp" />
        <input type="reset" value="Nullstill" name="nullstill" /> <br />
    </form>

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
</body>
</html>