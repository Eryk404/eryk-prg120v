<?php

  $tall01=$_POST["tall01"];
  $tall02=$_POST["tall02"];
  $tall03=$_POST["tall03"];

  Print("Tall 1 er $tall01 <br/>");
  Print("Tall 2 er $tall02 <br/>");
  Print("Tall 3 er $tall03 <br/>");
  Print("<br/>");

  if ($tall01 == $tall02)
  {
    print("Tall 1 er lik Tall 2 <br/>");
  }
  else if ($tall01 > $tall02)
  {
    print("Tall 1 er større enn Tall 2 <br/>");
  }
  else if ($tall01 < $tall02)
  {
    print("Tall 1 er mindre enn Tall 2 <br/>");
  }

  if ($tall01 == $tall03)
  {
    print("Tall 1 er lik Tall 3 <br/>");
  }
  else if ($tall01 > $tall03)
  {
    print("Tall 1 er større enn Tall 3 <br/>");
  }
  else if ($tall01 < $tall03)
  {
    print("Tall 1 er mindre enn Tall 3 <br/>");
  }

  if ($tall02 == $tall03)
  {
    print("Tall 2 er lik Tall 3 <br/>");
  }
  else if ($tall02 > $tall03)
  {
    print("Tall 2 er større enn Tall 3 <br/>");
  }
  else if ($tall02 < $tall03)
  {
    print("Tall 2 er mindre enn Tall 3 <br/>");
  }
  
?>