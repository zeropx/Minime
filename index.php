<?php
/*
  
  The point of this project is just practice and nothing else. 
  I took parts and ideas from other projects and creating something 
  for my self to play with.

	CHange from anoterh comptuer  
*/
require "config.php";
require "bootstrap.php";


if ( arg() ) {
  print '<pre style="color: #333; background-color: #FEEBD2; border: 1px solid #E3D3BA; padding: 3px; margin-bottom: 3px; font-size: 10px; font-family: Monaco">';
  print '- print_r at line <strong>'.__LINE__.'</strong> in file <strong>'.__FILE__.'</strong><br />';
  print_r(arg());
  print "</pre>";
}

print get_page();

//--Alex: I don't know wtf is going on
print "So on arg(), it tells you what line in what file.  Error catch?<br><br>p.s. eric smells.";
