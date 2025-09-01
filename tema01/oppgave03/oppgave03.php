<?php
//    Programmet mottar fra et HTML-skjema et fornavn og et etternavn ved POST-metoden
//   Programmet skriver ut en "god dag"-melding med personens navn 

  $fornavn=$_POST ["fornavn"];
  $etternavn=$_POST ["etternavn"];  
  $alder=$_POST ["alder"];

  print("God Dag $fornavn $etternavn, du er $alder år og like sprek! \n");
?>