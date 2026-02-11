<!DOCTYPE html>
<html lang="no">
<head>
  <!-- Metadata section for page settings and resources -->
  <meta charset="UTF-8"> <!-- Supports special characters like æ, ø, å -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vis studenter</title>
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

$sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
$antallRader=mysqli_num_rows($sqlResultat);

print ("<h3>Registrerte studenter </h3>");
print ("<table>");
print ("<tr><th align=left>brukernavn</th> <th align=left>fornavn</th> <th align=left>etternavn</th> <th align=left>klassekode</th> </tr>");

for ($r=1;$r<=$antallRader;$r++)
{
    $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
    $brukernavn=$rad["brukernavn"];
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];
    print ("<tr> <td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td> </tr>");
}

print ("</table>");

?>

</body>
</html>