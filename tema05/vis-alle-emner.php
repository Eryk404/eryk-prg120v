<!DOCTYPE html>
<html lang="no">
<head>
    <!-- Metadata section for page settings and resources -->
    <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vis alle emner</title>
</head>
<body>
<?php 

include("db-tilkobling.php");

$sqlSetning = "SELECT * FROM emne ORDER BY emnekode;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig å hente data fra databasen");
$antallRader = mysqli_num_rows($sqlResultat);

print("<h3>Registrerte emner</h3>");
print("<table border=1>");
print("<tr><th align=left>emnekode</th><th align=left>emnenavn</th><th align=left>studiumkode</th></tr>");

for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sqlResultat);
    $emnekode = $rad["emnekode"];
    $emnenavn = $rad["emnenavn"];
    $studiumkode = $rad["studiumkode"];
    print("<tr><td>$emnekode</td><td>$emnenavn</td><td>$studiumkode</td></tr>");
}

print("</table>");
?>

</body>
</html>