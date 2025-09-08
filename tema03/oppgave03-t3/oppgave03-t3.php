<?php

$tall = 1;

while ($tall <= 10)
  {
    print("$tall ");
    $tall ++;
    while ($tall >= 10 and $tall <= 20)
    {
      print("$tall <br/>");
      $tall ++;
      while ($tall >= 20 and $tall <= 30)
      {
        print("$tall <br/>");
        $tall ++;
      }
      print("<br/>");
    }
    print("<br/>");
  }
print("<br/>");
?>