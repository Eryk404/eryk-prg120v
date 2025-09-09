<?php

$sum = 0;
$avg = 0;

for($tall = 1; $tall <=10; $tall++)
{
  $sum = $sum + $tall;
}
$avg = $sum/$tall;
print("Summen av tallene fra 1 til 10 er $sum <br/>");
print("Gjennomsnittet av tallene fra 1 til 10 er $avg <br/>");
?>