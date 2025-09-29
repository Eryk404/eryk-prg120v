<!DOCTYPE html>
<html lang="no">
    <head>

    <!-- Metadata section for page settings and resources -->
    <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vis ale studium</title>

    </head>

</html>

<?php 

include("db-tilkobling.php");

$sqlSetning="SELECT * FROM studium ORDER BY studiumkode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat);

print ("<h3>Registrerte studier </h3>");
print ("<table border=1>");
print ("<tr><th align=left>studiumkode</th> <th align=left>studiumnavn</th> </tr>");

for ($r=1;$r<=$antallRader;$r++)
{
    $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
    $studiumkode=$rad["studiumkode"];
    $studiumnavn=$rad["studiumnavn"];
    print ("<tr> <td> $studiumkode </td> <td> $studiumnavn </td> </tr>");
}

print ("</table>");

?>