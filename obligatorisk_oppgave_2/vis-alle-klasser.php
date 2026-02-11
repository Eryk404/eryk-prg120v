<!DOCTYPE html>
<html lang="no">
<head>
  <!-- Metadata section for page settings and resources -->
  <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vis klasser</title>
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

    /* Styling for table */
    table {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      max-width: 400px;
      margin: 0 auto;
      text-align: center;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

  </style>
</head>

<body>

<?php 
include("db-tilkobling.php");

$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat);

print ("<h3>Registrerte klasser </h3>");
print ("<table>");
print ("<tr><th align=left>klassekode</th> <th align=left>klassenavn</th> <th align=left>studiumkode</th> </tr>");

for ($r=1;$r<=$antallRader;$r++)
{
    $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
    $klassekode=$rad["klassekode"];
    $klassenavn=$rad["klassenavn"];
    $studiumkode=$rad["studiumkode"];
    print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> <td> $studiumkode </td> </tr>");
}

print ("</table>");

?>

</body>
</html>