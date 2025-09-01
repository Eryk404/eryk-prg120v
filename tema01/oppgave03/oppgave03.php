<?php
//    Programmet mottar fra et HTML-skjema to tall ved POST-metoden
//   Programmet skriver ut summen og differansen ved bruk av begge tallene

  $tall01=$_POST ["tall01"];
  $tall02=$_POST ["tall02"];  

  $summen=$tall01+$tall02;
  $differanse=$tall01+$tall02;

  print("Tall 1 er $tall01 <br />");
  print("Tall 2 er $tall02 <br />");
  print("<br />");
  print("Summen er $summen <br />");
  print("Differansen er $differanse <br />");
?>