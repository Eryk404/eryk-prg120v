<?php 

function listeboksStudiumkode ()
{
    include("db-tilkobling.php"); /* tilkobling til database-server og valg av database utført */

    $sqlSetning="SELECT * FROM studium ORDER BY studiumkode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

    $antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */

    for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
        $studiumkode=$rad["studiumkode"];
        $studiumnavn=$rad["studiumnavn"];
        
        print("<option value='$studiumkode'>$studiumkode $studiumnavn </option>"); /* ny verdi i listeboksen laget */
    }
}



function listeboksEmnekode ()
{
    include("db-tilkobling.php"); /* tilkobling til database-server og valg av database utført */

    $sqlSetning="SELECT * FROM emne ORDER BY emnekode;";
    $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
    
    $antallRader=mysqli_num_rows($sqlResultat); /* antall rader i resultatet beregnet */

    for ($r=1;$r<=$antallRader;$r++)
    {
        $rad=mysqli_fetch_array($sqlResultat); /* ny rad hentet fra spørringsresultatet */
        $emnekode=$rad["emnekode"];
        $emnenavn=$rad["emnenavn"];
        $studiumkode=$rad["studiumkode"];

        print("<option value='$emnekode'>$emnekode $emnenavn </option>"); /* ny verdi i listeboksen laget*/
    }
}
?>