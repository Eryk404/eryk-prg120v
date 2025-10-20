<!DOCTYPE html>
<html lang="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer student</title>
</head>
<body>
    <h3>Registrer student</h3>
    <form method="post" action="">
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
        <input type="submit" value="Registrer student" name="registrerStudentKnapp" />
        <input type="reset" value="Nullstill" name="nullstill" /> <br />
    </form>

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
</body>
</html>