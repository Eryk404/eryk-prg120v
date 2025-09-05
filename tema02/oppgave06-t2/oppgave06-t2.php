<?php

  $tall01=$_POST["tall01"];
  $tall02=$_POST["tall02"];

  if ($tall01 == $tall02)
  {
    print("Tall 1 er lik Tall 2");
  }
  else if ($tall01 > $tall02)
  {
    print("Tall 1 er større enn Tall 2");
  }
  else if ($tall01 < $tall02)
  {
    print("Tall 1 er mindre enn Tall 2");
  }
  
?>